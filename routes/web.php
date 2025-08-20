<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/',[HomeController::class,'login'])->name('home.login');
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('home.dashboard');

Route::get('auth/login', [GoogleController::class, 'redirectToGoogle'])->name('login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/profile', [ProfileController::class, 'profile'])->name('auth.profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('auth.profile.update');

//Admin routes
//Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
//Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
//Route::get('/admin/register', [AdminController::class, 'registerForm'])->name('admin.register');
//Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
//Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/courses', function (){
    return view('course.index');
});

Route::get('/courses/show', function (){
    return view('course.show');
});

