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

      public function login(Request $request){
         $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
             return view('dashboard');
         }
         return redirect()->route('login')->with('error', 'Invalid credentials');
     }
     public function register(Request $request){
         $request->validate([
             'name' => 'required|string',
             'email' => 'required|email|unique:users',
             'password' => 'required|string|confirmed',
         ]);

         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
         ]);

         Auth::login($user);

         return redirect()->route('home.dashboard');
     }
    public function dashboard()
    {
         $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
