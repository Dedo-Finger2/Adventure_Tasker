<?php

use App\Http\Controllers\LoginController;
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
})->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'login'])
    -> name('login');
Route::post('/auth', [LoginController::class, 'auth'])
    -> name('auth');
Route::get('/logout', [LoginController::class, 'logout'])
    -> name('logout');

