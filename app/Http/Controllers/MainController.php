<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Role;
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

    public function newOffice(Request $request)
    {

        $office = new OfficesController();
        $office_id = $office->store($request);
        //dd($office_id);


        $role = new Role();
        $role->role = 'manager';
        $role->office_id = $office_id;
        $role->user_id = Auth::id();
        $role->save();


        $manager = new ManagersController();
        $manager->store($request);

        $updateOffice = Office::find($office_id);
        if ($updateOffice) {
            $updateOffice->manager_id = Auth::id(); // assuming manager_id should be updated, not Auth::id()
            $updateOffice->save();
        } else {
            // Handle the case where the office isn't found
            return response()->json(['error' => 'Office not found'], 404);
        }


        return response()->json('done', 200);
    }
}
