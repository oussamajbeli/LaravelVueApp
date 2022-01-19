<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasksList/{q?}', [App\Http\Controllers\TaskController::class, 'index']);
Route::get('/tasksList', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/tasksList', [App\Http\Controllers\TaskController::class, 'store']);
Route::get('/tasks/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit']);
Route::patch('/tasks/edit/{id}', [App\Http\Controllers\TaskController::class, 'update']);
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy']);
