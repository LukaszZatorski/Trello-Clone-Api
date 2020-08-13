<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Board;
use App\TaskList;

class TaskListController extends Controller
{

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'boardId' => 'required',
            'title' => 'required|max:100',
        ]);

        $taskList = TaskList::create([
            'board_id' => $attributes['boardId'],
            'title' => $attributes['title'],
        ]);

        return $taskList;
    }

    public function update(Request $request, TaskList $taskList)
    {
        $attributes = $request->validate([
            'title' => 'required|max:100'
        ]);

        $taskList->update($attributes);

        return $taskList;
    }

    public function destroy(TaskList $taskList)
    {
        $taskList->delete();
    }
}
