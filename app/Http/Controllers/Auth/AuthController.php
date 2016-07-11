<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Partners;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'PorC' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $nick_ = explode("@", $data['email']);

        if ($data['PorC'] == "ccc") {
            $userCreation = User::create([
                'name' => $data['name'],
                'nick' => $nick_[0],
                'email' => $data['email'],
                'PorC' => "C",
                'password' => bcrypt($data['password']),
                'profileImage' => '/files/userImage/default'
            ]);
            Client::create([
                'user_id' => $userCreation['id']
            ]);
        } else {
            $userCreation = User::create([
                'name' => $data['name'],
                'nick' => $nick_[0],
                'email' => $data['email'],
                'PorC' => "P",
                'password' => bcrypt($data['password']),
                'profileImage' => '/files/userImage/default'
            ]);

            Partners::create([
                'user_id' => $userCreation['id']
            ]);
        }


        return $userCreation;
    }
}
