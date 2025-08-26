<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        try {
            if ($request->hasFile('profile')) {
                // Delete old profile image if exists
                if ($user->profile && Storage::disk('public')->exists('profile_images/' . $user->profile)) {
                    Storage::disk('public')->delete('profile_images/' . $user->profile);
                }

                // Store new profile image
                $imageName = time() . '_' . $user->id . '.' . $request->profile->extension();
                $request->profile->storeAs('public/profile_images', $imageName);

                // Update user profile
                $user->profile = $imageName;
                $user->save();

                return redirect()->back()->with('success', 'Profile image updated successfully!');
            }

            return redirect()->back()->with('error', 'No image was uploaded.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile image. Please try again.');
        }
    }
}
