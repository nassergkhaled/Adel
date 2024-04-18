<?php

namespace App\Http\Controllers;

use App\Models\Manager;
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:managers,phone_number',
            'ID' => 'required|integer|unique:managers',
            'hiring_date' => 'required|date'
        ]);

        $manager = new Manager();
        $manager->user_id = Auth::id();
        $manager->full_name = $validatedData['full_name'];
        $manager->phone_number = $validatedData['phone'];
        $manager->ID = $validatedData['ID'];
        $manager->hiring_date = $validatedData['hiring_date'];
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
