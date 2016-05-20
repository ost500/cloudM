<?php

namespace App\Http\Controllers;

use App\Application;

use App\Contract;
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
            // 지원한 프로젝트
            $loginUser = Auth::user();
            $app = Application::where('u_id', '=', Auth::user()->id)
                ->where('choice', '=', '지원')
                ->orwhere('choice','=','미팅')
                ->get();

            //진행 중인 프로젝트
            $meeting = Contract::where('u_id', '=', Auth::user()->id)->get();
            $compeleted = Contract::where('u_id', '=', Auth::user()->id)
                ->where('step','=',['계약','대금지급'])->get();


            //완료 프로젝트
            return view('mypage/dashBoardP', compact('loginUser', 'app', 'meeting'));

        } else {
            $loginUser = Auth::user();
            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $checking = $projects->where('step', '=', '검수')->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $registered = $projects->where('step', '=', '게시')->orwhere('step','=','미팅')->get();


            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $proceeding = $projects->where('step', '=', '계약')
                ->orwhere('step', '=', '대금지급')
                ->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $done = $projects->where('step', '=', '6')->get();
            return view('mypage/dashBoardC',
                compact('loginUser', 'checking', 'registered', 'proceeding', 'done'));
        }
    }

 //Client DashBoard
    public function applicationList($id)
    {
        $applist = Application::where('p_id', '=', $id)->get();
//        $result_false="";
//        $result_true="";
//        foreach($applist as $app){
//            $result_true = $app->project->where('step','=','미팅')->get();
//            $result_false = $app->project->where('step','=','게시')->get();
//        }

        $loginUser = Auth::user();
        return view('mypage/applicant', compact('applist', 'loginUser'));
    }


    public function meetingProposal(Request $request)
    {
        $meeting_proposal = Application::find($request->id)->project;
        $meeting_proposal->step = "미팅";
        $meeting_proposal->save();

        return redirect()->back();
    }

    public function meetingCancel(Request $request)
    {
        $meeting_proposal = Application::find($request->id)->project;
        $meeting_proposal->step = "게시";
        $meeting_proposal->save();

        return redirect()->back();
    }
    public function contract(Request $request)
    {
        $app_carryon = Application::find($request->id);
        $app_carryon->choice = "진행";
        $app_carryon->save();

        $contract = new Contract();
        $contract->u_id = $app_carryon->u_id;
        $contract->p_id = $app_carryon->p_id;
        $contract->step = '계약';
        $contract->save();

        return redirect()->action('MypageController@dashBoard');
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
