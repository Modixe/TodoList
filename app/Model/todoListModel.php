<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class todoListModel extends Model
{
    protected $table = 'TodoList';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_list'
    ];
//    protected $hidden = [
//      'name_list'
//    ];

}
