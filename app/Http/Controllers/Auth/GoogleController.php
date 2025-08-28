<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SocialAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            Log::info('Google OAuth redirect initiated');
            return Socialite::driver('google')->redirect();
        } catch (Exception $e) {
            Log::error('Google OAuth redirect failed: ' . $e->getMessage());
            return redirect('/')->with('error', 'Unable to connect to Google. Please try again.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            Log::info('Google OAuth callback received');
            
            $googleUser = Socialite::driver('google')->user();
            Log::info('Google user data retrieved', [
                'email' => $googleUser->getEmail(),
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName()
            ]);

            // Check if user exists by email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                Log::info('Creating new user from Google OAuth');
                
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
                
                Log::info('New user created successfully', ['user_id' => $user->id]);
            } else {
                Log::info('Existing user found, updating last login', ['user_id' => $user->id]);
                
                // Update last login
                $user->update([
                    'last_login_at' => now(),
                    'last_login_ip' => request()->ip(),
                ]);
            }

            // Create or update social account
            $socialAccount = SocialAccount::updateOrCreate(
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

            Log::info('Social account updated/created', ['social_account_id' => $socialAccount->id]);

            // Create default communication preferences if they don't exist
            if (!$user->communicationPreferences) {
                $user->communicationPreferences()->create([
                    'email_course_updates' => true,
                    'email_promotions' => false,
                    'sms_otp' => true,
                    'sms_marketing' => false,
                ]);
                Log::info('Communication preferences created for user', ['user_id' => $user->id]);
            }

            // Login the user
            Auth::login($user);
            Log::info('User logged in successfully', ['user_id' => $user->id]);

            // Check if there's a specific redirect URL
            $redirectUrl = session('url.intended', '/dashboard');
            
            return redirect($redirectUrl)->with('success', 'Successfully logged in with Google!');

        } catch (Exception $e) {
            Log::error('Google OAuth callback failed: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect('/')->with('error', 'Something went wrong with Google login. Please try again. Error: ' . $e->getMessage());
        }
    }
}
