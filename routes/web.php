<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class)
    ->except(['show'])
    ->names(['index' => 'home']);

Route::get('/', function () {
    return redirect()->home();
});
