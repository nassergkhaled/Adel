<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LawyerClient;
use App\Models\LegalCase;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Case_;

class LegalCasesController extends Controller
{
    /*
    //INDEX
    */

    private function sharedIndex($user)
    {
        $data = [
            'isLowyer' => false
        ];
        if ($user->role == 'Lawyer') {


            // $clientsIds = LawyerClient::where('lawyer_id',Auth::id())->pluck('client_id');
            // $clients = Client::findMany($clientsIds);


            $clients = $user->lawyer->clients;
            $legalCases = $user->lawyer->legalCases;

            $data = [
                'clients' => $clients,
                'cases' => $legalCases,
                'isLowyer' => true,
            ];
        }
        else if ($user->role == 'Client') {

             $legalCases =LegalCase::where('client_id',$user->client->id)->get();
            $data = [
                'clients' => [],
                'cases' => $legalCases,
                'isLowyer' => false,
            ];
        }

        return $data;
    }
    public function index(Request $request)
    {
        // $officeId = Auth::user()->roles->first()->office_id;

        // //return All clients in my office
        // $clients = Client::whereHas('role', function ($query) use ($officeId) {
        //     $query->where('office_id', $officeId);
        // })->get();

        // // //return All legalCases in my office
        // // $legalCases = LegalCase::whereHas('roles', function ($query) use ($officeId) {
        // //     $query->where('office_id', $officeId);
        // // })->get();

        // //return All cases connected with me
        // $roleId = Auth::user()->roles->first()->id;

        // $legalCases = LegalCase::whereHas('roles', function ($query) use ($roleId) {
        //     $query->where('id', $roleId);
        // })->get();



        $user = Auth::user();


        $data = $this->sharedIndex($user);

        return view("legal_cases.index", compact("data"));
    }
    public function apiIndex(Request $request)
    {
        if ($request->user()) {
            $data = $this->sharedIndex($request->user());
            return response()->json(['data' => $data, 'message' => 'Success'], 200);
        }
        return response()->json(['message' => 'Bad Request'], 400);
    }

    public function create()
    {
    }

    /*
    Store.
    */


    private function sharedStore(Request $request, $user)
    {
        // Validate the incoming request data
        $validated = Validator::make($request->all(), [
            'case_name' => 'required|string|max:255',
            'client_id' => 'required|integer|exists:clients,id',
            'case_status' => 'required|string|in:Open,Closed,Pending',
            'case_type' => 'required|string',
            'case_openDate' => 'required|date',
            'case_closeDate' => 'required|date',
            'case_description' => 'required|string',
            'case_notes' => 'nullable|string',
        ]);


        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }


        $officeId = $user->office_id;


        // // Get IDs of all clients in my office
        // $clientRoleIds = Client::whereHas('role', function ($query) use ($officeId) {
        //     $query->where('office_id', $officeId);
        // })->pluck('role_id');
        // $client_id = $request->client_id;

        // // Check if the client role ID exists in my office role IDs
        // if (!$clientRoleIds->contains($client_id)) {
        //     return back()->with('errMsg', "Please do not tamper with the system.");
        // }




        $clientIds = $user->lawyer->clients->pluck('id');

        // Check if the client role ID exists in my office role IDs
        if (!$clientIds->contains($request->client_id)) {
            return back()->with('errMsg', "Please do not tamper with the system.");
        }


        $legalCase = new LegalCase();
        $legalCase->title = $request->case_name;
        $legalCase->status = $request->case_status;
        $legalCase->type = $request->case_type;
        $legalCase->open_date = $request->case_openDate;
        $legalCase->close_date = $request->case_closeDate;
        $legalCase->description = $request->case_description;
        $legalCase->notes = $request->case_notes;
        $legalCase->lawyer_id = $user->id;
        $legalCase->client_id = $request->client_id;
        $legalCase->save();


        // $role_ids = [$request->client_id, Auth::user()->roles->first()->id];
        // $legalCase->roles()->attach($role_ids);




        // to return response depends on where request come from (API or WEP)

        return $legalCase;
    }
    public function store(Request $request)
    {
        $this->sharedStore($request, Auth::user());
        return redirect()->back()->with('msg', 'Case added successfully!');
    }
    public function APIstore(Request $request)
    {
        $legalCase = $this->sharedStore($request, $request->user());
        return response()->json(['message' => 'Case added successfully!', 'LegalCase' => $legalCase], 200);
    }
    /**
     * Display the specified resource.
     */
    public function APIshow(Request $request, string $id)
    {
        if ($request->user())
            $user = $request->user();
        else
            return response()->json(['message' => 'Bad Request'], 400);

        $case = LegalCase::findOrFail($id);

        if ($case->lawyer->id !== $user->id)
            return response()->json(['message' => 'Unauthorized'], 400);

        return response()->json(['Message' => 'Founded', 'LegalCase' => $case], 200);
    }
    public function show(string $id)
    {

        $user = Auth::user();
        $case = LegalCase::findOrFail($id);

        if ($case->lawyer->id !== $user->id && $case->client->id !== $user->client->id)
            abort(404);

        return view('legal_cases.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
