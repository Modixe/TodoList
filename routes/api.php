<?php

use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\TaskCollection as TaskResource;

Route::namespace('Api')->group(function () {
    Route::apiResource('task_lists', 'TaskListController');
    Route::apiResource('task_lists.tasks', 'TaskController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


