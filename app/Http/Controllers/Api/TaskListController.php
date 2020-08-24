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
    public function index()
    {
        return response(TaskList::all(), 200);
    }

    /**
     * Сохраните вновь созданный ресурс в хранилище.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $create_task_list = TaskList::create($request->only('name_list', 'status'));
        return response($create_task_list, 201);
    }

    /**
     * Отобразить указанный ресурс.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $show_tasl_list = TaskList::findOrFail($id);
        return response($show_tasl_list, 200);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
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
    public function destroy(TaskList $task_list)
    {
        $task_list->delete();
    }
}
