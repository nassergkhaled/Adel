<?php

namespace App\Http\Controllers;

use App\Models\Case_Session_Witness;
use App\Models\LegalCase;
use App\Models\Witness;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class witnessesController extends Controller
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
            'case_id' => 'required|string|exists:legal_cases,id',
            'session_id' => 'nullable|string|exists:case_sessions,id',
            'witness_name' => 'required|string|max:255',
            'id_number' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'relationship' => 'required|string|max:30',
            'oath_availability' => 'required|boolean',
        ]);


        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $ImLawyer = Auth::user()->lawyer;
        if ($ImLawyer) {
            $caseBelongsToMe = $ImLawyer->legalCases->where('id', $request->case_id)->first();
            if ($caseBelongsToMe) {

                $witness = Witness::where('ID_no', strip_tags($request->id_number))->first();
                if (!$witness) {
                    $contact_info = [
                        "phone" => strip_tags($request->phone),
                        "address" => strip_tags($request->address),
                    ];

                    $data = [
                        'full_name' => strip_tags($request->witness_name),
                        'ID_no' => strip_tags($request->id_number),
                        'contact_info' => json_encode($contact_info),

                    ];

                    $witness = Witness::create($data);
                }



                $session_id = strip_tags($request->session_id) == "" ? null : strip_tags($request->session_id);
                $isLinkedBefore = Case_Session_Witness::where('legal_case_id', strip_tags($request->case_id))->where('witness_id', $witness->id)->where('case_session_id', $session_id)->first();
                if ($isLinkedBefore) {
                    return redirect()->back()->with('ValError', 'This witness is already linked to this case session');
                }

                $case_witness = [
                    'legal_case_id' => strip_tags($request->case_id),
                    'case_session_id' => $session_id,
                    'witness_id' => $witness->id,
                    'relationship' => strip_tags($request->relationship),
                    'oath_availability' => strip_tags($request->oath_availability),
                ];
                $case_witness = Case_Session_Witness::create($case_witness);


                // $case_witness = new Case_Session_Witness();
                // $case_witness->legal_case_id = strip_tags($request->case_id);
                // $case_witness->witness_id = $witness->id;
                // $case_witness->case_session_id = strip_tags($request->session_id) ?? null;
                // $case_witness->save();

                return redirect()->back()->with('msg', 'Witness added successfully!');
            }
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'There is an attempt to manipulate the data.');
        }
        return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
    }

    public function storeById(Request $request, $id_number)
    {
        $validated = Validator::make($request->all(), [
            'case_id' => 'required|string|exists:legal_cases,id',
            'relationship' => 'required|string|max:30',
            'oath_availability' => 'required|boolean',
        ]);


        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $ImLawyer = Auth::user()->lawyer;
        if ($ImLawyer) {
            $caseBelongsToMe = $ImLawyer->legalCases->where('id', $request->case_id)->first();
            if ($caseBelongsToMe) {

                $witness = Witness::where('ID_no', $id_number)->first();
                if (!$witness) {
                    return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
                }



                $session_id = strip_tags($request->session_id) == "" ? null : strip_tags($request->session_id);
                $isLinkedBefore = Case_Session_Witness::where('legal_case_id', strip_tags($request->case_id))->where('witness_id', $witness->id)->where('case_session_id', $session_id)->first();
                if ($isLinkedBefore) {
                    return redirect()->back()->with('ValError', 'This witness is already linked to this case session');
                }

                $case_witness = [
                    'legal_case_id' => strip_tags($request->case_id),
                    'case_session_id' => $session_id,
                    'witness_id' => $witness->id,
                    'relationship' => strip_tags($request->relationship),
                    'oath_availability' => $request->oath_availability,
                ];
                $case_witness = Case_Session_Witness::create($case_witness);


                // $case_witness = new Case_Session_Witness();
                // $case_witness->legal_case_id = strip_tags($request->case_id);
                // $case_witness->witness_id = $witness->id;
                // $case_witness->case_session_id = strip_tags($request->session_id) ?? null;
                // $case_witness->save();

                return redirect()->back()->with('msg', 'Witness added successfully!');
            }
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'There is an attempt to manipulate the data.');
        }
        return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
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
