<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_e164' => 'nullable|string|max:20|unique:users,phone_e164,' . $user->id,
            'date_of_birth' => 'nullable|date|before:today',
            'locale' => 'nullable|string|max:10',
            'timezone' => 'nullable|string|max:64',
            'country_code' => 'nullable|string|size:2',
            'marketing_opt_in' => 'boolean',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Handle profile image upload
            if ($request->hasFile('profile')) {
                // Delete old profile image if exists
                if ($user->profile && Storage::disk('public')->exists('profile_images/' . $user->profile)) {
                    Storage::disk('public')->delete('profile_images/' . $user->profile);
                }

                // Store new profile image
                $imageName = time() . '_' . $user->id . '.' . $request->profile->extension();
                $request->profile->storeAs('public/profile_images', $imageName);

                $user->profile = $imageName;
            }

            // Update user information
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_e164' => $request->phone_e164,
                'date_of_birth' => $request->date_of_birth,
                'locale' => $request->locale ?? 'de_DE',
                'timezone' => $request->timezone ?? 'Europe/Berlin',
                'country_code' => $request->country_code ?? 'DE',
                'marketing_opt_in' => $request->has('marketing_opt_in'),
                'updated_by' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
        }

        try {
            // Update password
            $user->update([
                'password' => Hash::make($request->new_password),
                'updated_by' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Password updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update password. Please try again.');
        }
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        try {
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
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile image. Please try again.');
        }
    }
}
