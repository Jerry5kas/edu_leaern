<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function showForm(){
        return view('welcome');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ✅ redirect just like Google login
            return redirect()->route('home.dashboard');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.logout');
    }
}
