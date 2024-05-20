<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [TaskController::class, 'index']);

Auth::routes();

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/task', [TaskController::class, 'store']);

Route::get('/task', [TaskController::class, 'show'])->name('tasks');

Route::delete('/task/{task}', [TaskController::class, 'destroy']);
