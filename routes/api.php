<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

//Route::apiResource('tasks', TaskController::class)
//    ->names([
//        'index' => 'home'
//    ]);

Route::group(['middleware' => ['auth']], function () {
    Route::apiResource('tasks', TaskController::class)
        ->except(['destroy'])
        ->names([
            'index' => 'home'
        ]);

    Route::delete('api/tasks/{task}', [TaskController::class, 'destroy'])
        ->middleware('permission:deleteTask');
});
