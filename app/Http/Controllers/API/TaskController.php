<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TaskList;
use App\Task;

class TaskController extends Controller
{

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'taskListId' => 'required',
            'description' => 'required',
        ]);

        $task = Task::create([
            'task_list_id' => $attributes['taskListId'],
            'description' => $attributes['description'],
        ]);

        return $task;
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'description' => 'required'
        ]);

        $task->update($attributes);

        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();
    }
}
