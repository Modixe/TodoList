<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskListController extends Controller
{
    /**
     * Вывести весь список ресурса.
     *
     * @return string
     */

    public function index() {
        return TaskList::all();
    }

    /**
     * Сохраните вновь созданный ресурс в хранилище.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        return TaskList::create($request->only('name_list', 'status'));
    }

    /**
     * Отобразить указанный ресурс.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id) {
        return TaskList::findOrFail($id);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, $id) {
        $task_List = TaskList::findOrFail($id);
        $task_List->update($request->only(
            'name_list',
            'status'
        ));
        return $task_List;
    }

    /**
     * Удалите указанный ресурс из хранилища.
     *
     * @param TaskList $task_list
     * @return void
     */

    public function destroy(TaskList $task_list) {
        TaskList::findOrFail($task_list->id)->delete();
    }
}
