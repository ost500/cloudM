<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function application_post($pid)
    {
        $newApp = new Application();
        $newApp->u_id = Auth::user()->id;
        $newApp->p_id = $pid;
        $newApp->save();
        return redirect()->action('MypageController@dashBoard');
    }
}
