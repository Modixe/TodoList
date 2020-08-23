<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
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

    public function taskList()
    {
        return $this->hasMany(TaskList::class, 'id', 'list_id');
    }
}
