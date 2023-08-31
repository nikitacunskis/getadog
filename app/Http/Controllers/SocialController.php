<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginGoogleUser($user);

        return redirect()->route('dashboard');
    }

    protected function _registerOrLoginGoogleUser($incomingUser) {
        $user = User::where('google_id', $incomingUser->id)->first();

        if(!$user){
            $user = new User();
            $user->name = $incomingUser->name;
            $user->email = $incomingUser->email;
            $user->google_id = $incomingUser->id;
            $user->password = encrypt('password');
            $user->save();
        }
        Auth::login($user);
    }
}