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

// Public routes
Route::get('/', [HomeController::class, 'showForm'])->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    // Traditional auth routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    
    // Google OAuth routes
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Test route to verify authentication
    Route::get('/test-auth', function () {
        return response()->json([
            'authenticated' => auth()->check(),
            'user' => auth()->user() ? [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'roles' => auth()->user()->roles->pluck('name')
            ] : null
        ]);
    })->name('test.auth');
});

// Redirect old route to new route
Route::get('/auth/profile', function () {
    return redirect()->route('profile');
})->name('auth.profile');

// Course routes
Route::get('/courses', function () {
    return view('course.index');
})->name('courses.index');

Route::get('/courses/show', function () {
    return view('course.show');
})->name('courses.show');

