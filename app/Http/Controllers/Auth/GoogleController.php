<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SocialAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user exists by email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'email_verified_at' => now(), // Google emails are verified
                    'password' => Hash::make(uniqid()), // Generate random password
                    'last_login_at' => now(),
                    'last_login_ip' => request()->ip(),
                ]);

                // Assign default role (Student)
                $user->assignRole('Student');
            } else {
                // Update last login
                $user->update([
                    'last_login_at' => now(),
                    'last_login_ip' => request()->ip(),
                ]);
            }

            // Create or update social account
            SocialAccount::updateOrCreate(
                [
                    'provider' => 'google',
                    'provider_user_id' => $googleUser->getId(),
                ],
                [
                    'user_id' => $user->id,
                    'provider_email' => $googleUser->getEmail(),
                    'avatar_url' => $googleUser->getAvatar(),
                    'raw_json' => $googleUser->getRaw(),
                ]
            );

            // Create default communication preferences if they don't exist
            if (!$user->communicationPreferences) {
                $user->communicationPreferences()->create([
                    'email_course_updates' => true,
                    'email_promotions' => false,
                    'sms_otp' => true,
                    'sms_marketing' => false,
                ]);
            }

            Auth::login($user);

            return redirect('/dashboard')->with('success', 'Successfully logged in with Google!');

        } catch (Exception $e) {
            return redirect('/')->with('error', 'Something went wrong with Google login. Please try again.');
        }
    }
}
