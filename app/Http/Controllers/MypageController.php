<?php

namespace App\Http\Controllers;

use App\Application;
use App\Partners;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashBoard()
    {
        if (Auth::user()->PorC == "P") {
            $loginUser = Auth::user();
            $app = Application::where('u_id', '=', Auth::user()->id)->get();
            return view('mypage/dashBoardP', compact('loginUser', 'app'));
            
        } else {
            $loginUser = Auth::user();
            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $checking = $projects->where('step', '=', '0')->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $registered = $projects->where('step', '=', '1')->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $proceeding = $projects->where('step', '>', '1')->where('step', '<', '6')->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $done = $projects->where('step', '=', '6')->get();
            return view('mypage/dashBoardC',
                compact('loginUser', 'checking', 'registered', 'proceeding', 'done'));
        }
    }

    public function mypage()
    {
        if (Auth::user()->PorC == "P") {
            $loginUser = Auth::user();
            return view('mypage/mypage', compact('loginUser'));
        } else {
            $loginUser = Auth::user();
            return view('mypage/mypage', compact('loginUser'));
        }

    }


    public function setting()
    {
        $loginUser = Auth::user();
        return view('mypage/setting', compact('loginUser'));
    }

}
