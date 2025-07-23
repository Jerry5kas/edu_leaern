<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'login'])->name('home.login');
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('home.dashboard');

Route::get('auth/login', [GoogleController::class, 'redirectToGoogle'])->name('login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

