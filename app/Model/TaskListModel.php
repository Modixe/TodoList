<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskListModel extends Model
{
    public $timestamps = true;

    protected $table = 'task_lists';

    protected $fillable = [
        'id',
        'name_list',
        'status'
    ];
//    protected $dates = [
//        'date_create',
//        'date_update'
//    ];
//    public function task_id(){
//        return $this->hasOne('App\Model\TasksModel', 'list_id', 'id');
//    }
    public function task_id(){
        return $this->hasMany('App\Model\TasksModel', 'list_id', 'id');
    }
}
