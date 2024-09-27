<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile',[ProfileController::class, 'show'])->name('profile');
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/',[ExampleController::class, 'home'])->middleware('auth');