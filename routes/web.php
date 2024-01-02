<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\DifficultyController;

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
Route::get('/profile', [UserController::class, 'profile'])
    ->name('user.profile');
Route::get('/my-tasks', [UserController::class, 'myTasks'])
    ->name('user.tasks');

// Task


// Priority
Route::get('/create-priority', [PriorityController::class, 'create'])
    ->name('priority.create');

    
// Difficulty
Route::get('/create-difficulty', [DifficultyController::class, 'create'])
    ->name('difficulty.create');
