<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class TaskList extends Model
{
    public $timestamps = true;

    protected $table = 'task_lists';

    protected $fillable = [
        'id',
        'name_list',
        'status'
    ];

    public function task_id(){
        return $this->hasMany('App\Model\TasksModel', 'list_id', 'id');
    }
}
