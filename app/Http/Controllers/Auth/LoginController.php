<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        
        if (!$user) {
            $user = new User();
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->email_verified_at = now();
            
            // Split full name into first name and last name
            $fullName = $data->name;
            $nameParts = explode(' ', $fullName, 2); // Split into max 2 parts (first name, last name)
            $user->first_name = $nameParts[0]; // First name
            $user->last_name = isset($nameParts[1]) ? $nameParts[1] : ''; // Last name (if available)
            
            $user->save();
        }
        
        Auth::login($user);
    }
    

    // Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('dashboard');
    }

    // Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->route('dashboard');
    }

    // Register or Login User
    
}
