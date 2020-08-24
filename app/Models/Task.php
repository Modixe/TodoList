<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $list_id
 * @property string  $task_name
 * @property string  $state
 * @property string  $urgency
 * @property string  $description_task
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

    /**
     * Связь между таблица task_list(id) и task(list_id) 
     */
    public function taskList()
    {
        return $this->hasMany(TaskList::class, 'id', 'list_id');
    }
}
