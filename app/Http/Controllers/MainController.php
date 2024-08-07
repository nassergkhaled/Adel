<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Manager;
use App\Models\Office;
use App\Models\Role;
use App\Models\Secretary;
use App\Models\User;
use App\Rules\ckeckSignupTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class MainController extends Controller
{

    public function dashboard()
    {

        // $roleId = Auth::user()->roles->first()->id;

        // //return All cases connected with me
        // $legalCases = LegalCase::whereHas('roles', function ($query) use ($roleId) {
        //     $query->where('id', $roleId);
        // });

        // // Get legal cases associated with the user's role
        // $legalCaseIds = $legalCases->pluck('id');

        // // Get roles that are associated with these legal cases
        // $roleIds = Role::whereHas('legalCases', function ($query) use ($legalCaseIds) {
        //     $query->whereIn('legal_cases.id', $legalCaseIds);
        // })->pluck('id');

        // // Get clients linked to the roles associated with legal cases
        // $clients = Client::whereHas('role', function ($query) use ($roleIds) {
        //     $query->whereIn('role_id', $roleIds);
        // })->get();

        // $legalCases = $legalCases->get();


        $user = Auth::user();

        switch ($user->role) {
            case 'Manager':
                $legalCases = LegalCase::whereHas('lawyer', function ($query) use ($user) {
                    $query->whereHas('user', function ($subQuery) use ($user) {
                        $subQuery->where('office_id', $user->office_id)
                            ->where('role', 'Lawyer');
                    });
                })->get();

                $clientsCount = Office::find($user->office_id)->clients->count();
                $data = [
                    'cases' => $legalCases,
                    'clientsCount' => $clientsCount,
                    'role' => $user->role,
                ];
                break;

            case 'Lawyer':
                // $clients = $user->lawyer->clients()->whereHas('legalCases')->get();
                $lawyer = $user->lawyer;
                $legalCases = $lawyer->legalCases;

                $myClientsIds = $legalCases->whereIn('status', ['Open', 'Pending'])->pluck('client_id')->unique();
                $clients = Client::findMany($myClientsIds);

                // $clientsCount = $legalCases->pluck('client_id')->unique()->count();
                $clientsCount = $lawyer->clients->count();

                $data = [
                    'clients' => $clients,
                    'cases' => $legalCases,
                    'clientsCount' => $clientsCount,
                    'role' => $user->role,
                ];
                break;

            case "Client":
                $legalCases = LegalCase::where('client_id', $user->client->id)->get();
                $data = [
                    'cases' => $legalCases,
                    'role' => $user->role,
                ];
                break;
        }


        return view('dashboard', compact('data'));
    }

    public function profile()
    {
        return view('profile.show');
    }

    public function calendar()
    {
        $user = User::find(Auth::id());
        $token = session('auth_token');

        if (empty($token)) {
            $token = $user->createToken('API Token', ['expires_in' => 120])->plainTextToken;
            session(['auth_token' => $token]);
        }

        return view('calendar', compact('token'));
    }

    public function completeRegistration()
    {
        return view('newUser/completeRegistration');
    }

    public function newOffice(Request $request)
    {
        $validatedData = $request->validate([
            'office_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'office_phone' => 'required|string|max:15',
            'manager_name' => 'required|string|max:255',
            'manager_phone' => 'required|string|max:15|unique:users,phone_number',
            'manager_id' => 'required|integer|unique:users,id_number',
            // 'hiring_date' => 'nullable|date'
        ]);

        //we should check if there is a record connected with this user by error (delete it before create a new one)

        $office = new OfficesController();
        $office_id = $office->store($request);
        //dd($office_id);

        $user = User::findOrFail(Auth::id());
        $user->role = 'Manager';
        $user->office_id = $office_id;
        $user->id_number = $request->manager_id;
        $user->phone_number = $request->manager_phone;
        $user->acceptedByManager = true;

        $newManager = [
            'manager_name' => $request->manager_name,
            'id' => Auth::id(),
        ];
        Manager::create($newManager);

        // $manager = new ManagersController();
        // $manager->store($request, $office_id);


        $updateOffice = Office::findOrFail($office_id);
        if ($updateOffice) {
            $updateOffice->manager_id = Auth::id(); // assuming manager_id should be updated, not Auth::id()
            $updateOffice->save();
        } else {
            return abort(403, 'Office Not Found');
        }

        $user->completeRegistration = true;
        $user->save();

        return redirect('dashboard');

        // return response()->json('done', 200);
    }

    public function joinOffice(Request $request)
    {
        $validatedData = $request->validate([
            'join_code' => 'required|string|max:37|exists:offices,subscription_code',
            'user_type' => 'required|string|in:Secretary,Lawyer',
            'full_name' => 'required|string|max:255',
            'user_phone' => 'required|string|max:15|unique:users,phone_number',
            'user_id_num' => 'required|integer|unique:users,id_number',
        ]);



        $type = $validatedData['user_type'];
        $role = Auth::user()->role;
        //dd($role);

        if (isEmpty($role)) {
            $userData = [
                'full_name' => $request->full_name,
                'id' => Auth::id(),
            ];

            $office_id = Office::where('subscription_code', $validatedData['join_code'])->first()->id;

            if ('Secretary' === $type) {
                User::where('id', Auth::id())->update([
                    'role' => $type,
                    'id_number' => $request->user_id_num,
                    'phone_number' => $request->user_phone,
                    'office_id' => $office_id,
                    'completeRegistration' => true,
                ]);

                Secretary::create($userData);
            } else if ('Lawyer' === $type) {
                User::where('id', Auth::id())->update([
                    'role' => $type,
                    'id_number' => $request->user_id_num,
                    'phone_number' => $request->user_phone,
                    'office_id' => $office_id,
                    'completeRegistration' => true,
                ]);

                Lawyer::create($userData);
            }
        }
        // $user = User::findOrFail(Auth::id());
        // $user->completeRegistration = true;
        // $user->save();

        return redirect('dashboard');
    }

    public function newClientUser(Request $request)
    {
        $validated = Validator::make($request->all(), [
            // 'join_code' => ['required','string','max:40',new ckeckSignupTokens('join_code')],            
            'signupToken' => ['required', 'string', 'max:27', 'exists:clients,signupToken'],
        ], [
            'signupToken.exists' => 'This joining code is invalid or has been used.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $client = Client::where('signupToken', $request->signupToken)->first();

        $client->user_id = Auth::id();
        $client->signupToken = null;
        $client->save();

        User::where('id', Auth::id())->update([
            'completeRegistration' => true,
            'role' => 'Client',
            'acceptedByManager' => true,
        ]);

        return redirect('dashboard')->with('msg', 'You have been registered successfully.');
    }

    public function fetchChatSessions(Request $request)
    {


        $user = User::find(Auth::id());
        $token = session('auth_token');

        if (empty($token)) {
            $token = $user->createToken('API Token', ['expires_in' => 120])->plainTextToken;
            session(['auth_token' => $token]);
        }
        $my_id = $user->id;
        $chatSessions = ChatSession::where('user1_id', $my_id)->orWhere('user2_id', $my_id)->orderByDesc('created_at')->get();
        $newChats = [];

        if ($user->role === "Lawyer") {
            $lawyer = $user->lawyer;
            $newChats = $lawyer->clients()
                ->whereNotNull('user_id')
                ->whereNotExists(function ($query) use ($lawyer) {
                    $query->select(DB::raw(1))
                        ->from('chat_sessions')
                        ->whereRaw('((user1_id = ? AND user2_id = clients.user_id) OR (user2_id = ? AND user1_id = clients.user_id))', [$lawyer->id, $lawyer->id]);
                })->get();
        }
        if ($user->role === "Client") {
            $client = $user->client;

            // Get all lawyers connected to the client through lawyer_clients table
            $newChats = Lawyer::whereExists(function ($query) use ($client) {
                $query->select(DB::raw(1))
                    ->from('lawyer_clients')
                    ->where('lawyer_clients.client_id', $client->id)
                    ->whereColumn('lawyer_clients.lawyer_id', 'lawyers.id');
            })
                // Filter out those who already have a chat session with the client
                ->whereNotExists(function ($query) use ($client) {
                    $query->select(DB::raw(1))
                        ->from('chat_sessions')
                        ->where(function ($query) use ($client) {
                            $query->where('user1_id', $client->user_id)
                                ->whereColumn('user2_id', 'lawyers.id');
                        })
                        ->orWhere(function ($query) use ($client) {
                            $query->where('user2_id', $client->user_id)
                                ->whereColumn('user1_id', 'lawyers.id');
                        });
                })
                ->get();
        }

        $data = [
            'chatSessions' => $chatSessions,
            'newChats' => $newChats,
            'api_token' => $token,
        ];
        return view('chating.index', compact('data'));
    }




    public function createManagerLawyerAccount()
    {
        $user = Auth::user();
        Lawyer::create([
            'full_name' => $user->full_name,
            'id' => $user->id,
        ]);
        User::find($user->id)->update(['role' => "Lawyer"]);
        return redirect()->back();
    }
    public function switchToLawyerInterface()
    {
        User::find(Auth::id())->update(['role' => "Lawyer"]);
        return redirect()->back();
    }
    public function switchToManagerInterface()
    {
        User::find(Auth::id())->update(['role' => "Manager"]);
        return redirect()->back();
    }


    public function cancelMembershipRequest()
    {
        $user = User::find(Auth::id());
        if ($user->acceptedByManager == 0) {
            $user->update([
                'completeRegistration' => 0,
                'office_id' => null,
                'phone_number' => null,
                'role' => 'New User',
                'id_number' => null,
            ]);
            switch ($user->role) {
                case "Lawyer":
                    Lawyer::find($user->id)->delete();
                    break;
                case "Secretary":
                    Secretary::find($user->id)->delete();
                    break;
            }
        }
        return redirect()->route('joinOffice');
    }
}
