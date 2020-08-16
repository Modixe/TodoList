<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TasksModel;
use App\Model\TaskListModel;

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
    public function index()
    {
//        $list_id = TasksModel::find(2);
//        dump($list_id->task_list);
        return TasksModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TasksModel::create($request->only('list_id', 'task_name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TasksModel::findOrFail($id);
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
        $todoList = TasksModel::findOrFail($id);
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
        TasksModel::findOrFail($id)->delete();
    }
}
