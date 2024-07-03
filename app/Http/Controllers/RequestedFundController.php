<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\requestedFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $validated = Validator::make($request->all(), [
            'case_id' => 'required|exists:legal_cases,id',
            'form_funds_cost' => 'required|numeric',
            'form_date' => 'required|date',
            'pay_method' => 'required|in:cash,wire',
            'bank_name' => 'required_if:pay_method,wire',
            'bank_account_number' => 'required_if:pay_method,wire',
            'form_email_message' => 'required|string',

        ]);


        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }
        $legalCase = LegalCase::find($request->case_id);
        $belongsToMe = $legalCase->lawyer->id === Auth::id();
        if (!$belongsToMe) {
            return redirect()->back()->withErrors($validated)->withInput()->with('errMsg', 'Unautherized!');
        }



        requestedFund::create([
            'case_id' => $request->case_id,
            'requested_amount' => $request->form_funds_cost,
            /* 'paid_amount'=>, */
            'pay_method' => $request->pay_method,
            /* 'pay_date'=>, */
            'due_date' => $request->form_date,
            'message' => $request->form_email_message,

        ]);

        return redirect('billings?Tab=requestedFunds')->with('msg', 'Requested Fund successfully created.');
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
        $fund = requestedFund::findOrFail($id);
        if ($fund->legalCase->lawyer_id !== Auth::id())
            return redirect()->back()->with('ValError', 'Unautherized.');
        if ($fund->paid_amount != 0)
            return redirect()->back()->with('ValError', 'The paid amount is not equal to zero.');
        if ($fund->invoice_id)
            return redirect()->back()->with('ValError', 'The fund belongs to an invoice.');
        $fund->delete();
        return redirect()->back()->with('msg', 'Requested Fund successfully deleted');
    }
}
