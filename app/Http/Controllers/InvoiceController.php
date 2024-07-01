<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\LegalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
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
            'related_case' => 'required|exists:legal_cases,id',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }
        $legalCase = LegalCase::find($request->related_case);
        $belongsToMe = $legalCase->lawyer->id === Auth::id();
        if (!$belongsToMe) {
            return redirect()->back()->withErrors($validated)->withInput()->with('errMsg', 'Unautherized!');
        }


        $expenses = $legalCase->expenses->where('invoice_id', null);
        $funds = $legalCase->requestedFunds->where('paid_amount', '>', '0')->where('invoice_id', null)->sortByDesc('pay_date');


        $expenses_amount = $expenses->sum('total_amount');
        $paidFunds_amount = $funds->sum('paid_amount');
        $invoice_amount = $expenses_amount - $paidFunds_amount;

        $invoice = invoice::create([
            'case_id' => strip_tags($request->related_case),
            'expenses_amount' => $expenses_amount,
            'paidFunds_amount' => $paidFunds_amount,
            'invoice_amount' => $invoice_amount,
            'status' => 0,
        ]);

        foreach ($expenses as $expense) {
            $expense->invoice_id = $invoice->id;
            $expense->save();
        }
        foreach ($funds as $fund) {
            $fund->invoice_id = $invoice->id;
            $fund->save();
        }


        return redirect('billings?Tab=invoices')->with('msg', 'Invoice successfully created');
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
