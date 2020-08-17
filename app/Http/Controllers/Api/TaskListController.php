<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;


class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */

    public function index() {
        return TaskList::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TaskList::create($request->only('name_list', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        if (!empty($task)){
//            $list_id = Task::findOrFail($task);
//            return $list_id;
//        }
        return TaskList::findOrFail($id);
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
        $todoList = TaskList::findOrFail($id);
        $todoList->update($request->only(
            'name_list',
            'status'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskList $task_list)
    {
        TaskList::findOrFail($task_list->id)->delete();

    }
}
