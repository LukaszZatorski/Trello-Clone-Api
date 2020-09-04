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
            'tasks_order' => '',
        ]);

        $taskList->board->update(['task_lists_order' => $taskList->board->task_lists_order . ' ' . $taskList->id ]);

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

        $taskList->board->update(['task_lists_order' => str_replace(' ' . $taskList->id, '', $taskList->board->task_lists_order)]);
    }
}
