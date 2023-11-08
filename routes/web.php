<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;

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
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/create-user', [App\Http\Controllers\UserController::class, 'create'])->name('user');
Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('user-store');
Route::get('/presence', [App\Http\Controllers\presenceController::class, 'presence_index'])->name('presence_index');
Route::post('/presence-store', [App\Http\Controllers\presenceController::class, 'presence_store'])->name('presence_store');
