<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Board;

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
            'title' => 'required|max:100'
        ]);

        $board = Board::create([
            'user_id' => User::where('email', $attributes['email'])->first()->id,
            'title' => $attributes['title'],
        ]);

        return $board;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
