<?php

namespace App\Http\Controllers;

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


        $user =Auth::user();

        $data = [
            'flag' => false
        ];
        if (Auth::user()->role == 'Lawyer') {
            
            
            // $clients = $user->lawyer->clients()->whereHas('legalCases')->get();

            $legalCases = $user->lawyer->legalCases;

            $myClientsIds = $legalCases->pluck('client_id')->unique();
            $clients = Client::findMany($myClientsIds);

            $data = [
                'clients' => $clients,
                'cases' => $legalCases,
                'flag' => true,
            ];
        }


        return view('dashboard', compact('data'));
    }
    public function profile()
    {
        return view('profile.show');
    }
    public function calender()
    {
        return view('calender');
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
            'join_code' => ['required', 'string', 'max:25', 'exists:clients,signupToken'],
        ], [
            'join_code.exists' => 'This joining code is invalid or has been used.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $client = Client::where('signupToken', $request->join_code)->first();

        User::where('id', Auth::id())->update([
            'completeRegistration' => true,
            'role' => 'Client'
        ]);

        $client->user_id = Auth::id();
        $client->signupToken = null;
        $client->save();

        return redirect('dashboard')->with('msg', 'You have been registered successfully.');
    }
}
