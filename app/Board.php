<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'user_id', 'title', 'color', 'task_lists_order'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function taskLists()
    {
        return $this->hasMany('App\TaskList');
    }
}
