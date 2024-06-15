<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientOffice;
use App\Models\LawyerClient;
use App\Models\LegalCase;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;



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


        /*
        $officeId = Auth::user()->roles->first()->office_id;

        //return All clients in my office
        $clients = Client::whereHas('role', function ($query) use ($officeId) {
            $query->where('office_id', $officeId);
        })->get();
        */



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


        $data = [
            'flag' => false
        ];

        if (Auth::user()->role == 'Lawyer') {
            $clientsIds = LawyerClient::where('lawyer_id', Auth::id())->pluck('client_id');
            $clients = Client::findMany($clientsIds);
            // $clients = Auth::user()->lawyer->clients;
            // dd($clients);


            $data = [
                'clients' => $clients,
                'flag' => true,
            ];
        }


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

    public function storeById($id_number)
    {
        if (Client::all()->pluck('id_number')->contains(strip_tags($id_number))) {
            $id = Client::where('id_number', $id_number)->first()->id;
            if (LawyerClient::where('client_id', $id)->where('lawyer_id', Auth::id())->get()->count()) {
                return redirect()->back()->with('ValError', 'You already have this client!');
            } else {
                $client_id = $id;
                $lawyer_client = new LawyerClient();
                $lawyer_client->lawyer_id = Auth::id();
                $lawyer_client->client_id = $client_id;
                $lawyer_client->save();

                ClientOffice::create(['office_id' => Auth::user()->office_id, 'client_id' => $client_id]);
            }
        }
        return back()->with('msg', "Client added successfully");
    }
    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'user_name' => 'required | max:50 | string ',
            // 'client_id_num' => 'required | integer  | unique:users,id_number',
            'client_id_num' => 'required | integer', // we should check if theres no chance to find two ids with the same number in deferent countrieis
            'phone' => 'required|max:14|string|unique:clients,phone_number|unique:users,phone_number',
        ], [
            'user_name.required' => 'The client name is required.',
            'user_name.max' => 'The client name must not be greater than 50 characters.',
            'user_name.string' => 'The client name must be a string.',
            'client_id_num.required' => 'The client ID number is required.',
            'client_id_num.integer' => 'The client ID number must be an integer.',
            'client_id_num.unique' => 'The client ID number has already been taken.',
            'phone.required' => 'The phone number is required.',
            'phone.max' => 'The phone number must not be longer than 14 characters.',
            'phone.string' => 'The phone field must be a number.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }


        if (Client::all()->pluck('id_number')->contains(strip_tags($request->input('client_id_num')))) {
            if (LawyerClient::where('client_id', strip_tags($request->input('client_id_num')))->where('lawyer_id', Auth::id())) {
                return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'You already have this client!');
            } else {
                $client_id = Client::where('id_number', strip_tags($request->input('client_id_num')))->first()->id;
                $lawyer_client = new LawyerClient();
                $lawyer_client->lawyer_id = Auth::id();
                $lawyer_client->client_id = $client_id;
                $lawyer_client->save();

                ClientOffice::create(['office_id' => Auth::user()->office_id, 'client_id' => $client_id]);
            }
        } else {
            $signupToken = str::random(20); // Generates a 20-character random string for user to link him with system if he want to create new account

            $client = new Client();
            $client->full_name = strip_tags($request->input('user_name'));
            $client->id_number = strip_tags($request->input('client_id_num'));
            $client->phone_number = strip_tags($request->input('phone'));
            $client->signupToken = 'client-' . $signupToken;
            $client->save();

            $lawyer_client = new LawyerClient();
            $lawyer_client->lawyer_id = Auth::id();
            $lawyer_client->client_id = $client->id;
            $lawyer_client->save();
            ClientOffice::create(['office_id' => Auth::user()->office_id, 'client_id' => $client->id]);
        }


        return back()->with('msg', "Client added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'client' => Client::find($id)
        ];
        return view('clients.show', compact("data"));
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
