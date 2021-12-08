<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);

Route::get('/tasks', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);

Route::get('/tasks/{task:id}', [TaskController::class, 'edit']);
Route::patch('/tasks/{task:id}', [TaskController::class, 'update']);
Route::delete('/tasks/{task:id}', [TaskController::class, 'destroy']);
