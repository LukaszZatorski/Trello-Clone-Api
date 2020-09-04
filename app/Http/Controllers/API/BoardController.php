<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Board;
use App\TaskList;

class BoardController extends Controller
{
    public function index(User $user)
    {
        return $user->boards;
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required',
            'title' => 'required|max:100',
            'color' => 'required'
        ]);

        $board = Board::create([
            'user_id' => User::where('email', $attributes['email'])->first()->id,
            'title' => $attributes['title'],
            'color' => $attributes['color'],
            'task_lists_order' => '',
        ]);

        return $board;
    }

    public function show(Board $board)
    {
        return $board->load('taskLists.tasks');
    }

    public function update(Request $request, Board $board)
    {
        $attributes = $request->validate([
            'title' => 'required|max:100',
            'color' => 'required'
        ]);

        $board->update($attributes);

        return $board;
    }

    public function destroy(Board $board)
    {
        $board->delete();
    }
}
