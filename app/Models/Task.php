<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
//        return $this->hasMany('App\Model\TaskListModel', 'id', 'list_id');
        return $this->hasMany(TaskList::class, 'id',
            'list_id');
    }
}
