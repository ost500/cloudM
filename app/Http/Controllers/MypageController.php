<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mypage()
    {
        if (Auth::user()->PorC == "P")
        {
            $loginUser = Auth::user();
            return view('mypage/partnerMypage', compact('loginUser'));
        }
        else
        {
            $loginUser = Auth::user();
            return view('mypage/clientMypage', compact('loginUser'));
        }

    }


    public function setting()
    {
        $loginUser = Auth::user();
        return view('mypage/setting', compact('loginUser'));
    }

}
