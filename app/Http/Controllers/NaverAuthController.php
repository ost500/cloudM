<?php

namespace App\Http\Controllers;

use App\Client;
use App\Partners;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laravel\Socialite\Facades\Socialite;
use Session;
use Validator;

class NaverAuthController extends Controller
{

    public function redirectToProvider()
    {
//        echo "hi";
        return Socialite::with('naver')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::with('naver')->user();

        $profile_save = array('email' => $user->email);
        $vali = Validator::make($profile_save, [
            'email' => 'unique:users',
        ]);

        if (!$vali->fails()) {
            if (Session::pull("PorC") == null) {
                Session::flash('message', '먼저 가입 하세요');
                return redirect('/register');
            } else if (Session::pull("PorC") == "C") {
                $userCreation = User::create([
                    'name' => $user->name,
                    'nick' => explode("@", $user['email'])[0],
                    'email' => $user->email,
                    'PorC' => "C",
                    'profileImage' => '/files/userImage/default',
                    'confirmed' => 1
                ]);
                Client::create([
                    'user_id' => $userCreation['id']
                ]);
            } else {
                $userCreation = User::create([
                    'name' => $user->name,
                    'nick' => explode("@", $user['email'])[0],
                    'email' => $user->email,
                    'PorC' => "P",
                    'profileImage' => '/files/userImage/default',
                    'confirmed' => 1
                ]);
                Partners::create([
                    'user_id' => $userCreation['id']
                ]);
            }

            Auth::loginUsingId($userCreation['id']);
            return redirect('/');
        }
        Auth::loginUsingId(User::where('email', $user->email)->get()->first()->id);

        return redirect()->action("MainController@index");
    }
}