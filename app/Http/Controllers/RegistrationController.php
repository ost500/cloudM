<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class RegistrationController extends Controller
{
    public function confirm($confirmation_code)
    {
        if (!$confirmation_code) {
            return view('errors.503');
        }
        $user = User::where('confirmation_code', $confirmation_code)->get()->first();
        if (!$user) {
            return view('errors.503');
        }
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        Session::flash('message','이메일 인증에 성공했습니다. 로그인해 주세요');

        return redirect()->action('Auth\AuthController@login');

    }
}
