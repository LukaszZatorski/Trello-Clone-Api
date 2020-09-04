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

        $task->taskList->update(['tasks_order' => $task->taskList->tasks_order . ' ' . $task->id ]);

        return $task;
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

        $task->taskList->update(['tasks_order' => str_replace(' ' . $task->id, '', $task->taskList->tasks_order)]);
    }
    
    public function reorder(Request $request, Task $task)
    {
        if ($task->task_list_id == $request->destinationListId){
            $task->taskList->update(['tasks_order' => $request->destinationListTaskOrder]);
        } else {
            $task->taskList->update(['tasks_order' => $request->sourceListTaskOrder]);
            $task->update(['task_list_id' => $request->destinationListId]);
            TaskList::where('id', $request->destinationListId)->update(['tasks_order' => $request->destinationListTaskOrder]);
        }
    }
}
