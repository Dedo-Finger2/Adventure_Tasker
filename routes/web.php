<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreController;
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
Route::post('/logout', [LoginController::class, 'logout'])
    -> name('logout');


// User
Route::get('/register', [UserController::class, 'create'])
    ->name('user.create');
Route::get('/profile', [UserController::class, 'profile'])
    ->name('user.profile')->middleware('auth');
Route::get('/my-tasks', [UserController::class, 'myTasks'])
    ->name('user.tasks')->middleware('auth');
Route::get('/my-inventory', [UserController::class, 'myInventory'])
    ->name('user.inventory')->middleware('auth');

// Task


// Priority
Route::get('/create-priority', [PriorityController::class, 'create'])
    ->name('priority.create')->middleware('auth');


// Difficulty
Route::get('/create-difficulty', [DifficultyController::class, 'create'])
    ->name('difficulty.create')->middleware('auth');


// Stores
Route::get('/stores', [StoreController::class, 'index'])->name('store.stores')->middleware('auth');
Route::get('/store-item', [StoreController::class, 'itemStore'])->name('store.items')->middleware('auth');

// Item
Route::get('/create-item', [ItemController::class, 'create'])->name('item.create')->middleware('auth');
