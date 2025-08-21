<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfileController;

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
Route::get('/',[HomeController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


Route::get('auth/login', [GoogleController::class, 'redirectToGoogle'])->name('login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/profile', [ProfileController::class, 'profile'])->name('auth.profile');
//Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('auth.profile.update');

Route::get('/courses', function (){
    return view('course.index');
});

Route::get('/courses/show', function (){
    return view('course.show');
});

