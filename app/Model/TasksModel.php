<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TasksModel extends Model
{
    public $timestamps = true;

    protected $table = 'tasks';

    protected $fillable = [
        'id',
        'list_id',
        'task_name',
        'state',
        'description_task',
        'urgency'
    ];

    public function task_list(){
        return $this->hasMany('App\Model\TaskListModel', 'id', 'list_id');
    }
}
