<?php

use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\TaskCollection as TaskResource;


Route::namespace('Api')->group(function (){
    Route::apiResource('todo_lists', 'TodoListController');
});

Route::namespace('Api')->group(function (){
    Route::apiResource('task_lists', 'TaskListController');

    Route::apiResource('task_lists.tasks', 'TaskController');
//    Route::apiResource('/tasks', 'TaskListController');

});

//Route::get('task_lists/{id}/tasks', 'Api\TaskListController@test');


//Route::get('task', function () {
//    return TaskResource::collection(TaskListModel::all());
//});
//Route::get('task', function () {
//    return new TaskResource(TaskListModel::all());
//});

//Route::namespace('Api')->group(function (){
//    Route::apiResource('task_lists/tasks', 'TaskController');
//});

//Route::get('task_lists/{id}', function ($listId, Request $request){
//   $includes = explode(',', $request>input('include', ''));
//   return (new ListTransformer(User::findorFail($listId), $includes));
//});
