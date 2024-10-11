<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SignupTermsController;
use Illuminate\Support\Facades\Route;

Route::get('/profile',[ProfileController::class, 'show'])->name('profile');
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::get('/signup',[SignupController::class, 'showSignupForm'])->name('signup-account');
Route::get('/signup-terms',[SignupTermsController::class, 'showSignupTermsForm'])->name('signup-terms');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/',[ExampleController::class, 'home'])->middleware('auth');