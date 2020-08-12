<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\TodoListModel;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
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
        return TodoListModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TodoListModel::create($request->only('name_list'));
//        return response()->json(todoListModel::create($request->only('name_list')));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TodoListModel::findOrFail($id);
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
        $todoList = TodoListModel::findOrFail($id);
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
        TodoListModel::findOrFail($id)->delete();
    }
}