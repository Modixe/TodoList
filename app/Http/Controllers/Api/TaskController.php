<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param TaskList $task_list
     * @return string
     */
//    public function todoList(){
//        return response()->json(todoListModel::get(), 200);
//    }
    public function index(TaskList $task_list)
    {
        $list_id = Task::where('list_id', $task_list->id)->get();
        return $list_id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param TaskList $task_list
     * @return Response
     */
    public function store(Request $request, TaskList $task_list)
    {
        $create_task = Task::create ([
            'list_id' => $request->task_list->id,
            'task_name'=> $request->task_name,
            'state'=> $request->state,
            'description_task'=>$request->description_task,
            'urgency'=>$request->urgency
        ]);
//        dd($task_list, $request, $create_task);
        return $create_task;
    }

    /**
     * Display the specified resource.
     *
     * @param TaskList $task_list
     * @param Task $task
     * @return Task|JsonResponse|object
     */
    public function show(TaskList $task_list, Task $task)
    {
//
        $list_i = Task::findOrFail($task->id);
        return $list_i;

//
//        return $task;
//        return response()->json($list_id)->setStatusCode(200, 'Successful Edited');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, TaskList $taskList, Task $task)
    {
        $update_task = Task::findOrFail($task->id);
        $update_task->update ($request->only(
            'task_name',
            'description_task',
            'urgency',
            'state'
        ));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(TaskList $taskList, Task $task)
    {
        Task::findOrFail($task->id)->delete();
    }
}
