<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LegalCase;
use App\Models\Office;
use App\Models\Role;
use App\Models\User;
use App\Rules\ckeckSignupTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{

    public function dashboard()
    {
        $roleId = Auth::user()->roles->first()->id;

        //return All cases connected with me
        $legalCases = LegalCase::whereHas('roles', function ($query) use ($roleId) {
            $query->where('id', $roleId);
        });

        // Get legal cases associated with the user's role
        $legalCaseIds = $legalCases->pluck('id');

        // Get roles that are associated with these legal cases
        $roleIds = Role::whereHas('legalCases', function ($query) use ($legalCaseIds) {
            $query->whereIn('legal_cases.id', $legalCaseIds);
        })->pluck('id');

        // Get clients linked to the roles associated with legal cases
        $clients = Client::whereHas('role', function ($query) use ($roleIds) {
            $query->whereIn('role_id', $roleIds);
        })->get();

        $legalCases = $legalCases->get();

        $data = [
            'clients' => $clients,
            'cases' => $legalCases,
        ];

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
            'manager_id' => 'required|integer|unique:managers,manager_id_number',
            // 'hiring_date' => 'nullable|date'
        ]);

        //we should check if there is a record connected with this user by error (delete it before create a new one)

        $office = new OfficesController();
        $office_id = $office->store($request);
        //dd($office_id);


        $role = new Role();
        $role->role = 'Manager';
        $role->office_id = $office_id;
        $role->user_id = Auth::id();
        $role->save();


        $manager = new ManagersController();
        $manager->store($request, $office_id);

        $updateOffice = Office::find($office_id);
        if ($updateOffice) {
            $updateOffice->manager_id = Auth::id(); // assuming manager_id should be updated, not Auth::id()
            $updateOffice->save();
        } else {
            // Handle the case where the office isn't found
            // return response()->json(['error' => 'Office not found'], 404);
            return abort(403, 'Office Not Found');
        }

        $user = User::findOrFail(Auth::id());
        $user->completeRegistration = true;
        $user->save();

        return redirect('dashboard');

        // return response()->json('done', 200);
    }
    public function newClientUser(Request $request)
    {
        $validated = Validator::make($request->all(), [
            // 'join_code' => ['required','string','max:40',new ckeckSignupTokens('join_code')],            
            'join_code' => ['required','string','max:25','exists:clients,signupToken'],            
        ], [
            'join_code.exists' => 'This joining code is invalid or has been used.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $client = Client::where('signupToken',$request->join_code)->first();

        Role::where('id', $client->role_id)->update(['user_id' => Auth::id()]);
        User::where('id', Auth::id())->update(['completeRegistration' => true]);

        $client->signupToken = null;
        $client->save();

        return redirect('dashboard')->with('msg','You have been registered successfully.');     
        
    }
}
