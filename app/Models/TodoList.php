<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_lists';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_list'
    ];

}
