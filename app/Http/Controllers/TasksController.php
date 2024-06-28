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
    public function index(Request $request)
    {

        $user = Auth::user();
        $lawyer = $user->lawyer;


        if (!empty($request->all())) {
            if (!$request->Case_Client) {
                $val = [
                    'Case_Client' => ['nullable', 'string'],
                ];
            } else {
                $val = [
                    'Case_Client' => ['required', 'string', new existCLientOrCase],
                ];
            }
            $validated = Validator::make($request->all(), $val + [
                'AssignedTo' => 'nullable|string|in:Me,All,Others',
                'TaskStatus' => 'nullable|string|in:All,Incomplete,Completed',
                'duration' => 'nullable|string|in:AllTime,Last7,Last30,Last90,LastYear,date',
                'data_from' => 'nullable|date',
                'data_to' => 'nullable|date',
            ]);
            if ($validated->fails()) {
                return redirect()->back()->withErrors($validated)->withInput()->with('ValError', 'Verify the entered data!');
            }
            if ($request->Case_Client) {
                $Case_Client = $this->extractClientCaseId($request->Case_Client);
            }

            $tasks_assigned_filter = $user->tasks_assigned;
            $tasks_created_filter = $user->tasks_created;
            $tasks_filter = $tasks_assigned_filter->merge($tasks_created_filter);
            // dd($tasks_filter->where('relatedClient_id', '3'));

            if ($request->Case_Client) {
                if ($Case_Client) {
                    if ($Case_Client['type'] == 'client') {
                        $tasks_filter = $tasks_filter->where('relatedClient_id', $Case_Client['id']);
                    } else if ($Case_Client['type'] == 'case') {
                        $tasks_filter = $tasks_filter->where('relatedCase_id', $Case_Client['id']);
                    }
                }
            }
            if ($request->AssignedTo) {
                if ($request->AssignedTo == 'Me') {
                    $tasks_filter = $tasks_filter->where('assigned_to', $user->id);
                } else if ($request->AssignedTo == 'Others') {
                    $tasks_filter = $tasks_filter->where('assigned_to', '!=', $user->id);
                }
            }
            if ($request->TaskStatus) {
                if ($request->TaskStatus == 'Incomplete') {
                    $tasks_filter = $tasks_filter->where('status', '0');
                } else if ($request->TaskStatus == 'Completed') {
                    $tasks_filter = $tasks_filter->where('status', '1');
                }
            }
            if ($request->duration) {
                if ($request->duration == 'Last7') {
                    $tasks_filter = $tasks_filter->where('due_date', '>=', now()->subDays(7));
                } else if ($request->duration == 'Last30') {
                    $tasks_filter = $tasks_filter->where('due_date', '>=', now()->subDays(30));
                } else if ($request->duration == 'Last90') {
                    $tasks_filter = $tasks_filter->where('due_date', '>=', now()->subDays(90));
                } else if ($request->duration == 'LastYear') {
                    $tasks_filter = $tasks_filter->where('due_date', '>=', now()->subYear());
                } else if ($request->duration == 'date') {
                    if (!empty($request->data_from)) {
                        $tasks_filter = $tasks_filter->where('due_date', '>=', $request->data_from);
                    }
                    if (!empty($request->data_to)) {
                        $tasks_filter = $tasks_filter->where('due_date', '<=', $request->data_to);
                    }
                }
            }
            $data = [
                'lawyer' => [],
                'tasks' => $tasks_filter,
            ];
            if ($lawyer) {
                $data = [
                    'lawyer' => $lawyer,
                    'tasks' => $tasks_filter,
                ];
            }
        } else {
            $data = [
                'lawyer' => [],
                'tasks' => $user->tasks_assigned,
            ];
            if ($lawyer) {
                $tasks = $user->tasks_assigned->merge($user->tasks_created);
                $data = [
                    'lawyer' => $lawyer,
                    'tasks' => $tasks,
                ];
            }
        }


        //$tasks = $user->tasks_assigned;
        return view("tasks.index", compact("data"))->with('request', $request->all());
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
            'assignTo' => 'exists:users,id',
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
                    'relatedCase_id' => $client_case_id['id'],
                    'relatedClient_id' => null,
                ];
            } elseif ($client_case_id['type'] == 'client') {
                $client = Client::where('id', $client_case_id['id'])->first();
                if (!$client && $client->lawyer->id !== $user->id) {
                    return redirect()->back()->withErrors($validated)->withInput()->with('errMsg', 'UnAutharized');
                }
                $taskData = [
                    'relatedCase_id' => null,
                    'relatedClient_id' => $client_case_id['id'],

                ];
            }
        } elseif (!$request->client_case_id) {
            $taskData = [
                'relatedCase_id' => null,
                'relatedClient_id' => null,
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
        // if ($request->TaskforMe) {
        //     $task->assignedTo()->attach([$user->id]);
        // } elseif ($client_case_id['type'] == 'client') {
        //     $client = Client::find($client_case_id['id']);
        //     $task->assignedTo()->attach([$client->id]);
        // }
        $task->assignedTo()->attach([$request->assignTo]);


        if ($task->reminder) {
            $notifications = [];
            foreach ($task->assignedTo as $assignedUser) {

                $notifications[] = [
                    'title' => 'مهمة جديدة',
                    'body' => 'تم اسناد مهمة جديدة لك بعنوان '
                        . $task->title .
                        ' ذات اولوية '
                        . __($task->priority['name']) . ' ممتدة حتى تاريخ ' . $task->due_date,
                    'user_id' => $assignedUser->id,
                ];
            };

            $notifications[] = [
                'title' => 'مهمة جديدة',
                'body' => 'تم انشاء مهمة جديدة من قبلك بعنوان '
                    . $task->title .
                    'ذات اولوية '
                    . __($task->priority['name']) . ' ممتدة حتى تاريخ ' . $task->due_date,
                'user_id' => $user->id,
            ];
            $notificationsController = new NotificationsController();
            $notificationsController->pushNotification($notifications);
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
