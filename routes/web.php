<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/{orderBy?}/{sortBy?}', [TaskController::class, 'index'])
    ->where([
        'orderBy' => '(name|user_id|status_id|priority_id)',
        'sortBy' => '(asc|desc)'
    ]);

Route::get('/tasks/{task:id}', [TaskController::class, 'edit']);
Route::get('/tasks', [TaskController::class, 'create']);

Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{task:id}', [TaskController::class, 'update']);
Route::delete('/tasks/{task:id}', [TaskController::class, 'destroy']);
