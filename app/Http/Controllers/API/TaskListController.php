<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Board;
use App\TaskList;

class TaskListController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
