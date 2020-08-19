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
     * Вывести весь список ресурса.
     *
     * @param TaskList $task_list
     * @return string
     */
    public function index(TaskList $task_list) {
        $all_lists = Task::where('list_id', $task_list->id)->get();
        return $all_lists;
    }
    /**
     * Сохраните вновь созданный ресурс в хранилище.
     *
     * @param Request $request
     * @return Response
     *
     */
    public function store(Request $request) {
        $create_task = Task::create ([
            'list_id' => $request->task_list->id,
            'task_name'=> $request->task_name,
            'state'=> $request->state,
            'description_task'=>$request->description_task,
            'urgency'=>$request->urgency
        ]);
        return $create_task;
    }

    /**
     * Отобразить указанный ресурс.
     *
     * @param TaskList $taskList
     * @param Task $task
     * @return Task|JsonResponse|object
     */
    public function show(TaskList $taskList,Task $task) {
        $lists= Task::findOrFail($task->id);
        return $lists;
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param Request $request
     * @param Task $task
     * @return void
     */
    public function update(Request $request, Task $task) {
        $update_task = Task::findOrFail($task->id);
        $update_task->update ($request->only(
            'task_name',
            'description_task',
            'urgency',
            'state'
        ));
    }

    /**
     * Удалите указанный ресурс из хранилища.
     *
     * @param Task $task
     * @return void
     */
    public function destroy(Task $task) {
        Task::findOrFail($task->id)->delete();
    }
}
