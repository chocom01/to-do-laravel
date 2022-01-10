<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::apiResource('tasks', TaskController::class)
        ->except(['destroy']);

    Route::delete('api/tasks/{task}', [TaskController::class, 'destroy'])
        ->middleware('permission:deleteTask');
});
