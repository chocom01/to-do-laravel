<?php

use App\Http\Controllers\Web\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)
        ->except(['show'])
        ->names([
            'index' => 'home',
            'edit' => 'edit.task'
        ]);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return redirect()->home();
    });
});

require __DIR__ . '/auth.php';
