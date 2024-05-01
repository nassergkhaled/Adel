<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class OfficesController extends Controller
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
            'office_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'office_phone' => 'required|string|max:15',
        ]);

        $subscription_code = str::random(30); // Generates a 30-character random string for office to link it with users when they create new account


        $office = new Office();
        $office->office_name = $validatedData['office_name'];
        $office->location = $validatedData['location'];
        $office->office_phone = $validatedData['office_phone'];
        $office->subscription_code = 'office-'.$subscription_code;
        //$office->manager_id = Auth::id();
        $office->save();
        return $office->id;
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
