<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile')) {
            $imageName = time() . '.' . $request->profile->extension();
            $request->profile->storeAs('public/profile_images', $imageName);

            $user->profile = $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
