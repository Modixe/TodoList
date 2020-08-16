<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskList;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Task::create($request->only('list_id', 'task_name'));
    }

    /**
     * Display the specified resource.
     *
     * @param TaskList $task_list
     * @param Task $task
     * @return Task|\Illuminate\Http\JsonResponse|object
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todoList = Task::findOrFail($id);
        $todoList->update($request->only('name_list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
    }
}
