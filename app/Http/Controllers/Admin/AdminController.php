<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show login form
    public function loginForm()
    {
        return view('admin.login');
    }

    // Handle login (you need to implement authentication logic)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Here you should add authentication logic (e.g., using Auth)
        return view('admin.dashboard');
    }

    // Show registration form
    public function registerForm()
    {
        return view('admin.register');
    }

    // Handle admin registration
    public function register(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed',
            'confirm_password' => 'required|same:password',
        ]);

         Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('admin.dashboard')->with('success', 'Admin registered successfully');
    }

    // Show admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
