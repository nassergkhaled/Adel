<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$office_id)
    {
        $validatedData = $request->validate([
            'manager_name' => 'required|string|max:255',
            'manager_phone' => 'required|string|max:15|unique:users,phone_number',
            'manager_id' => 'required|integer|unique:managers,manager_id_number',
            // 'hiring_date' => 'required|date'
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->phone_number = $validatedData['manager_phone'];
        $user->id_number = $validatedData['manager_id'];
        $user->save();
        
        $manager = new Manager();
        $manager->user_id = Auth::id();
        $manager->manager_name = $validatedData['manager_name'];
        // $manager->hiring_date = $validatedData['hiring_date'];
        $manager->office_id= $office_id;
        $manager->save();

        return ;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
