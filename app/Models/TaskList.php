<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string  $name_list
 * @property string  $status
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
}
