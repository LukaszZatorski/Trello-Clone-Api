<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = [
        'board_id', 'title'
    ];

    public function board() {
        return $this->belongsTo('App\Board');
    }
}
