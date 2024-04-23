<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
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
        return view('completeRegistration');
    }

    public function newOffice(Request $request)
    {
        $validatedData = $request->validate([
            'office_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'office_phone' => 'required|string|max:15',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users,phone_number',
            'ID' => 'required|integer|unique:managers',
            'hiring_date' => 'required|date'
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
        $manager->store($request,$office_id);

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
}
