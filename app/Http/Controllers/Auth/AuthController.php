<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'phone_e164' => 'required|regex:/^\+[1-9]\d{1,14}$/|unique:users,phone_e164',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'phone_e164' => $request->phone_e164,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('dashboard')->with('success', 'Registered successfully!');
    }
}
