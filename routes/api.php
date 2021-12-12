<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//get all tasks
Route::get('/tasks', 'TaskController@getAllTask');

//get task details by id
Route::get('/task/{id}', 'TaskController@getTaskById');

//add new task
Route::post('/addTask', 'TaskController@addTask');

//update task
Route::put('/updateTask/{id}', 'TaskController@updateTask');

//delete tasak
Route::delete('/deleteTask/{id}', 'TaskController@deleteTask');