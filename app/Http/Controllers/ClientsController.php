<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::where("user_id", Auth()->id())->get();

        return view('clients.index',compact('clients'));
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
        

        $client = new Client();
        $client->full_name = strip_tags($request->input('user_name'));
        $client->ID = strip_tags($request->input('client_id_num'));
        $client->contact_info =  $request->input('phone');
        $client->user_id = 1;

        $client->save();

        return response()->json('sdfcasde');

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
