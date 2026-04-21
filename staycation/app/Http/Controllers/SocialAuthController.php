<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Check if user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Register a new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(24)), // Random password for oauth
                ]);
            } else {
                // Update google_id if user exists but doesn't have it linked
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId()
                    ]);
                }
            }

            Auth::login($user);

            return redirect()->intended(route('dashboard', absolute: false));

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Failed to login using Google. Error: ' . $e->getMessage()]);
        }
    }
}
