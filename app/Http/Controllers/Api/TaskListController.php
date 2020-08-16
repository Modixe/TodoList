<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\TaskListModel;
use App\Model\TasksModel;
use App\User;
use Illuminate\Http\Request;


class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
//    public function todoList(){
//        return response()->json(todoListModel::get(), 200);
//    }
    public function test($id = NULL){

        if (!empty($id)){
            $list_id = TaskListModel::find($id);
            dump($list_id->task_id);
        }
        return TaskListModel::all();


    }

    public function index($id = NULL)
    {
        if (!empty($id)){
            $list_id = TaskListModel::find($id);
            $data = $list_id->task_id;
            return $data;
        }
        return TaskListModel::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->task_list)){
            $create_task = TasksModel::create([
                'list_id' => $request->task_list,
                'task_name'=> $request->task_name
        ]);
            return $create_task;
        }
        else  return TaskListModel::create($request->only('name_list', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $task = null)
    {
        if (!empty($task)){
            $list_id = TasksModel::findOrFail($task);
            return $list_id;
        }
        return TaskListModel::findOrFail($id);
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
        $todoList = TaskListModel::findOrFail($id);
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
        TaskListModel::findOrFail($id)->delete();
    }
}
