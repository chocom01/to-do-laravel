<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
