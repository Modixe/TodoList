<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TodoListModel extends Model
{
    protected $table = 'todo_lists';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_list'
    ];

}
