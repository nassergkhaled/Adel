<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
            'case' => 'required|exists:legal_cases,id',
            'form_select_activity' => 'required',
/*             'form_select_cost' => 'required | in:1',
*/            'form_description' => 'required',
            'form_date' => 'required|date',
            'form_cost' => 'required|numeric',
            'form_quantity' => 'required|integer',
        ]);

        expense::create([
        'description' => $request->form_description,
        'date' => $request->form_date,
        'quantity' => $request->form_quantity,
        'case_id'=>$request->case,
        'activity'=>$request->form_select_activity,
        'activity_type'=>1,
        'amount'=> $request->form_cost,
        'total_amount'=>$request->form_cost*$request->form_quantity,
        'is_paid'=>0,

        ]);

        return redirect('billings?Tab=expenses')->with('msg', 'Expense added successfully');
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
