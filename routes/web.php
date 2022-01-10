<?php

use App\Http\Controllers\Web\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks', TaskController::class)
        ->except(['show', 'destroy']);

    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])
        ->middleware('permission:deleteTask');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('tasks.index');
    });
});

require __DIR__ . '/auth.php';
