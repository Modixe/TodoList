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
    public function index(TaskList $task_list)
    {
        $all_tasks = Task::where('list_id', $task_list->id)->get();

        return $all_tasks;
    }

    /**
     * Сохраните вновь созданный ресурс в хранилище.
     *
     * @param Request $request
     * @param TaskList $task_list
     * @return Response
     */
    public function store(Request $request, TaskList $task_list)
    {
        return response(
            Task::create([
                'list_id'          => $task_list->id,
                'task_name'        => $request->task_name,
                'state'            => $request->state,
                'description_task' => $request->description_task,
                'urgency'          => $request->urgency
            ])
        , 201);
    }

    /**
     * Отобразить указанный ресурс.
     *
     * @param TaskList $taskList
     * @param Task $task
     * @return Task|JsonResponse|object
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param Request $request
     * @param Task $task
     * @return void
     */
    public function update(Request $request, Task $task)
    {
        $update_task = $task;
        $update_task->update($request->only(
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
    public function destroy(Task $task)
    {
        $task->delete();
    }
}
