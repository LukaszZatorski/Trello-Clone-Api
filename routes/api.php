<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/{user:email}', function(App\User $user){
        return $user;
    });
    Route::get('/users/{user:email}/boards', 'API\BoardController@index');
    Route::get('/boards/{board}', 'API\BoardController@show');
    Route::post('/boards', 'API\BoardController@store');
    Route::delete('/boards/{board}', 'API\BoardController@destroy');
    Route::patch('/boards/{board}', 'API\BoardController@update');

    Route::post('/task-lists', 'API\TaskListController@store');
    Route::delete('/task-lists/{taskList}', 'API\TaskListController@destroy');
    Route::patch('/task-lists/{taskList}', 'API\TaskListController@update');
});
