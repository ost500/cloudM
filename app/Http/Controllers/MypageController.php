<?php

namespace App\Http\Controllers;

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
        $loginUser = Auth::user();
        return view('mypage/mypage', compact('loginUser'));
    }

    public function setting()
    {
        $loginUser = Auth::user();
        return view('mypage/setting', compact('loginUser'));
    }
    
    public function partnerMypage()
    {
        $loginUser = Auth::user();
        return view('mypage/modify', compact('loginUser'));
    }
}
