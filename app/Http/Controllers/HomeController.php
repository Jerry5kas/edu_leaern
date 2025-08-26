<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Show the home page
     */
    public function showForm()
    {
        return view('welcome');
    }

    /**
     * Show the dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }
}
