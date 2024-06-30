<?php

namespace App\Http\Controllers;

use App\Models\requestedFund;
use Illuminate\Http\Request;

class RequestedFundController extends Controller
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

        $request->validate([
            'to_contact' => 'required|exists:clients,id',
            'form_funds_cost' => 'required|numeric',
            'form_date' => 'required|date',
            'form_select_bank' => 'required',
            'form_email_message' => 'required|string',

            ]);


        requestedFund::create([
        'case_id'=>$request->to_contact,
        'requested_amount'=>$request->form_funds_cost,
        /* 'paid_amount'=>, */
        'pay_method'=>$request->form_select_bank,
        /* 'pay_date'=>, */
        'due_date'=>$request->form_date,
        'message'=>$request->form_email_message,

            ]);

            return redirect('billings?Tab=requestedFunds')->with('msg', 'Requested Fund successfully created');
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
