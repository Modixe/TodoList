<?php

use App\Model\TodoListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Api;

//
//Route::get('todoList','Api\todoListController@index');
//
//Route::get('todoList/{id}','Api\todoListController@show');
//
//Route::post('todoList','Api\todoListController@store');

Route::namespace('Api')->group(function (){
    Route::apiResource('todo_lists', 'TodoListController');
});
