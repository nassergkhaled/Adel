<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $tasks = Task::where('created_by', $user_id)->get(); // Fetch all tasks, consider adding pagination or filters as needed
        return response()->json($tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'title' => $task->title,
                'start' => Carbon::parse($task->start_date)->toIso8601String(),
                'end' => Carbon::parse($task->due_date)->toIso8601String(),
                'priority' => $task->priority,
            ];
        }));
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
    public function store(Request $request, $user_id)
    {



        // $data = [
        //     'case_id' => null,
        //     'created_by' => Auth::id(),
        //     'title' => $request->title,
        //     'description' => 'dsf',
        //     'start_date' => $request->start ? Carbon::parse($request->start)->format('Y-m-d H:i:s') : Carbon::now(),
        //     'completion_date',
        //     'due_date' => $request->end ? Carbon::parse($request->end)->format('Y-m-d H:i:s') : null,
        //     'status' => 'complete',
        //     'priority' => 'low',
        // ];
        $task = new Task();
        $task->created_by = $user_id;
        $task->title = $request->title;
        $task->description = 'nothing';
        $task->start_date = $request->start ? Carbon::parse($request->start)->format('Y-m-d H:i:s') : Carbon::now();
        $task->due_date = $request->end ? Carbon::parse($request->end)->format('Y-m-d H:i:s') : null;
        $task->status = 'complete';
        $task->priority = 'high';
        $task->save();

        $request->merge(['id' => $task->id]);



        // return response()->json([
        //     'id' => $task->id,
        //     'title' => $task->title,
        //     'start' => $task->start_date ? Carbon::parse($task->start_date)->toIso8601String() : null,
        //     'end' => $task->due_date ? Carbon::parse($task->due_date)->toIso8601String() : null,
        //     'priority' => $task->priority,
        // ]);

        return response()->json($request);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return response()->json('55');
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
    public function update(Request $request, $user_id, string $id)
    {
        $data = [
            'title' => $request->title,
            'due_date' =>  Carbon::parse($request->end)->format('Y-m-d H:i:s'),
            'start_date' => Carbon::parse($request->start)->format('Y-m-d H:i:s'),
        ];
        Task::where('created_by', $user_id)->where('id', $id)->update($data);
        return response()->json('Done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, string $id)
    {
        Task::where('created_by', $user_id)->where('id', $id)->delete();
        // Task::destroy($id);
        return response()->json("Success", 200);
    }
}
