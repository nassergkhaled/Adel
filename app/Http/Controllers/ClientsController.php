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
        /* $clients = Auth::user()->roles->first()->office->roles->getQuery()->where('role','client')->get();*/
        /* $clients = Auth::user()->roles->first()->office->roles;*/
        /* dd($clients); */

        $officeId = Auth::user()->roles->first()->office_id;

        //return All clients in my office
        $clients = Client::whereHas('role', function ($query) use ($officeId) {
            $query->where('office_id', $officeId);
        })->get();

        $data=[
            'clients'=> $clients,

        ];
        return view('clients.index', compact('data'));
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

        $request->validate([
            'user_name' => 'required | max:50 | string ',
            'client_id_num' => 'required | integer | unique:clients,ID_number',
            'phone' => 'required | max:14 | string',
        ]);

        $role = new Role();
        $role->role = 'client';
        $role->office_id = Auth::user()->roles->first()->office_id;
        $role->user_id = null;
        $role->save();

        $signupToken = str::random(20); // Generates a 20-character random string for user to link him with system if he want to create new account


        $client = new Client();
        $client->role_id = $role->id;
        $client->full_name = strip_tags($request->input('user_name'));
        $client->ID_number = strip_tags($request->input('client_id_num'));
        $client->phone_number = strip_tags($request->input('phone'));
        $client->signupToken = $signupToken;
        $client->save();

        return back();
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
