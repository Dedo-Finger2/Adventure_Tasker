<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'login'])
    -> name('login');
Route::post('/auth', [LoginController::class, 'auth'])
    -> name('auth');
Route::get('/logout', [LoginController::class, 'logout'])
    -> name('logout');


// User
Route::get('/register', [UserController::class, 'create'])
    ->name('user.create');
