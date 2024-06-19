<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LegalCase;
use App\Models\Task;
use App\Rules\existCLientOrCase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $lawyer = $user->lawyer;
        $data = [
            'lawyer' => [],
            'tasks_created' => [],
            'tasks_assigned' => $user->tasks_assigned,
        ];
        if ($lawyer) {
            $data = [
                'lawyer' => $lawyer,
                'tasks_created' => $user->tasks_created,
                'tasks_assigned' => $user->tasks_assigned,
            ];
        }
        return view("tasks.index", compact("data"));
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
    private function extractClientCaseId($string)
    {
        $parts = explode('-', $string);

        $data = [
            'type' => $parts[0],
            'id' => $parts[1],
        ];

        return $data;
    }
    public function store(Request $request)
    {
        if ($request->TaskforMe) {
            $val = [
                'client_case_id' => ['nullable', 'string'],
            ];
        } else {
            $val = [
                'client_case_id' => ['required', 'string', new existCLientOrCase],
            ];
        }
        $validated = Validator::make($request->all(), $val + [
            // 'client_case_id' => ['required_without', 'string', new existCLientOrCase],
            'TaskforMe' => 'nullable',
            'task_title' => 'required|string',
            'due_date' => 'required|date',
            'priority' => 'required|integer|in:1,2,3',
            'description' => 'required|string',
            'Reminder' => 'nullable',
        ]);

        // Security
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
        }

        $user = Auth::user();
        if (!($user->lawyer || $user->manager || $user->secretary)) {
            return redirect()->back()->withErrors($validated)->withInput()->with('errMsg', 'UnAutharized');
        }
        if ($request->client_case_id) {
            $client_case_id = $this->extractClientCaseId($request->client_case_id);
            if ($client_case_id['type'] == 'case') {
                $case = LegalCase::find($client_case_id['id']);
                if (!$case && $case->lawyer->id !== $user->id) {
                    return redirect()->back()->withErrors($validated)->withInput()->with('errMsg', 'UnAutharized');
                }
                $taskData = [
                    'case_id' => $client_case_id['id'],
                ];
            } elseif ($client_case_id['type'] == 'client') {
                $client = Client::find($client_case_id['id']);
                if (!$client && $client->lawyer->id !== $user->id) {
                    return redirect()->back()->withErrors($validated)->withInput()->with('errMsg', 'UnAutharized');
                }
                $taskData = [
                    'case_id' => null,
                ];
            }
        } elseif (!$request->client_case_id) {
            $taskData = [
                'case_id' => null,
            ];
        } else {
            return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Something Went Wrong!');
        }


        $taskData += [
            'created_by' => $user->id,
            'title' => strip_tags($request->task_title),
            'due_date' => strip_tags($request->due_date),
            'priority' => strip_tags($request->priority),
            'description' => strip_tags($request->description),
            'status' => 0,
            'reminder' => strip_tags($request->Reminder ? 1 : 0),
        ];
        $task = Task::create($taskData);
        if ($request->TaskforMe) {
            $task->assignedTo()->attach([$user->id]);
        } elseif ($client_case_id['type'] == 'client') {
            $client = Client::find($client_case_id['id']);
            $task->assignedTo()->attach([$client->user_id]);
        }
        return redirect()->back()->with('msg', 'Task added successfully!');
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
