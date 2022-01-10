<?php

use App\Http\Controllers\Web\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class)
    ->except(['show'])
    ->names([
        'index' => 'home',
        'edit' => 'edit.task'
    ]);

Route::get('/', function () {
    return redirect()->home();
});
