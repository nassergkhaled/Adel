<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Auth::user()->clients;

        return view('clients.index', compact('clients'));
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

        // $request->validate([
        //     'user_name' => 'required | max:50 | string ',
        //     'client_id_num' => 'required | integer',
        //     'phone' => 'required | max:13 | integer',
        // ])

        $role = new Role();
        $role->role = 'client';
        $role->office_id = Auth::user()->roles->first()->office_id;
        $role->user_id = null;
        $role->save();

        $signupToken = str::random(40); // Generates a 40-character random string for user to link him with system if he want to create new account


        $client = new Client();
        $client->role_id = $role->id;
        $client->full_name = strip_tags($request->input('user_name'));
        $client->ID_number = strip_tags($request->input('client_id_num'));
        $client->contact_info =  $request->input('phone');
        $client->signupToken = $signupToken;
        $client->save();

        return response()->json('done');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('client.show', [
            'client' => Client::find($id)
        ]);
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
