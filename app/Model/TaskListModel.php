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
}
