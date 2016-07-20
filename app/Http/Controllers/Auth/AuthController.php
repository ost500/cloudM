<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Partners;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Mail;
use Illuminate\Http\Request;
use phpbrowscap\Exception;
use Session;
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

    use AuthenticatesAndRegistersUsers {
        validateLogin as vali;
        register as regi;
        login as log;
    }
    use ThrottlesLogins;

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


    protected function validateLogin(Request $request)
    {


        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);


        try {
            $user = User::where('email', $request->email)->get()->first();

            if ($user->confirmed == 1) {
                $confirm_validator = false;
            } else {
                $confirm_validator = true;
            }

        } catch (\Exception $e) {
            return true;
        }


        if ($confirm_validator) {
            $confirmation_code = $user->confirmation_code;
            $to_email = $request['email'];
            $to_name = $user->name;
            Mail::queue('mail.register_confirm_mail', ['confirmation_code' => $confirmation_code],
                function ($message) use ($to_email, $to_name) {
                    $message->to($to_email, $to_name)
                        ->subject('[패스트엠] 회원가입용 이메일 인증');
                });
            return false;
        } else
            return true;
    }


    public function login(Request $request)
    {
        if (!$this->validateLogin($request)) {


            return redirect()->back()
                ->withErrors([
                    $this->loginUsername() => "이메일 인증 요청을 다시 보내 드렸습니다. 이메일 인증을 받으세요",
                ]);
        }
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && !$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }




    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->create($request->all());

        Session::flash('message',$request->email.'로 인증 메일을 발송해 드렸습니다.\n이메일 인증 후 회원가입이 완료 됩니다.');

        return redirect()->route('home');
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
        $confirmation_code = str_random(30);

        if ($data['PorC'] == "ccc") {
            $userCreation = User::create([
                'name' => $data['name'],
                'nick' => $nick_[0],
                'email' => $data['email'],
                'PorC' => "C",
                'password' => bcrypt($data['password']),
                'profileImage' => '/files/userImage/default',
                'confirmation_code' => $confirmation_code
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
                'profileImage' => '/files/userImage/default',
                'confirmation_code' => $confirmation_code
            ]);

            Partners::create([
                'user_id' => $userCreation['id']
            ]);
        }

        Mail::queue('mail.register_confirm_mail', ['confirmation_code' => $confirmation_code],
            function ($message) use ($data) {
                echo $data['email'], $data['name'];
                $message->to($data['email'], $data['name'])
                    ->subject('[패스트엠] 회원가입용 이메일 인증');
            });


        return $userCreation;
    }
}
