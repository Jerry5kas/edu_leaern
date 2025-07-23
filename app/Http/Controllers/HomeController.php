<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
     public function login(){
         return view('welcome');
     }
    public function dashboard()
    {
         $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }
}
