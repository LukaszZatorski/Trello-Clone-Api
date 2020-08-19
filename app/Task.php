<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_list_id', 'description', 'completed'
    ];

    public function taskList()
    {
        return $this->belongsTo('App\TaskList');
    }
}
