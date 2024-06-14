<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Session;

class SessionsController extends Controller
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

    private function uploadFile($newFile)
    {
        $file =  'Doc-' . uniqid() . '.' . $newFile->extension();
        $newFile->move(public_path('files'), $file);

        return $file;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'case_id' => 'required|string|exists:legal_cases,id',
            'session_name' => 'required|string|max:50',
            'session_status' => 'required|string|in:Postponed,Finished,Scheduled',
            'session_Date' => 'required|date',
            'Judge_name' => 'required|string|max:50',
            'session_location' => 'required|string|max:100',
        ]);


        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $data =  [
            'case_id' => strip_tags($request->case_id),
            'session_name' => strip_tags($request->session_name),
            'session_status' => strip_tags($request->session_status),
            'session_Date' => strip_tags($request->session_Date),
            'Judge_name' => strip_tags($request->Judge_name),
            'session_location' => strip_tags($request->session_location),
            'file'=> $this->uploadFile($request->file)
        ];

        Session::create($data);
        return redirect()->back()->with('msg', 'Witness added successfully!');
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
