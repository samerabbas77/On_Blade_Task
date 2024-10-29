<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [TaskController::class, 'index'])->name('home');

/**
 * Task routes
 */
Route::group([
    'middleware'=>'is_logIn']
    ,function ($router) {
        Route::resource('task',TaskController::class);
        Route::patch('task/{task}/status',[TaskController::class,'changeStatus'])->name('task.changeStatus');
        Route::get('task\search',[TaskController::class,'search'])->name('task.search');
    });
