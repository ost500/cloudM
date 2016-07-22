<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laravel\Socialite\Facades\Socialite;

class NaverAuthController extends Controller
{
    
    public function redirectToProvider()
    {
        return Socialite::with('naver')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::with('naver')->user();
        dd($user);
//        $userToLogin = User::where([
//            'provider' => 'naver',
//            'socialid' => $user->getId(),
//        ])->first();
//        if (!$userToLogin) {
//            $userToLogin = new User([
//                'provider' => 'naver',
//                'socialid' => $user->getId(),
//                'token' => $user->token,
//                'name' => $user->getName(),
//            ]);
//            $userToLogin->save();
//        }
//
//        Auth::login($userToLogin);
//        return redirect('/');
    }
}
