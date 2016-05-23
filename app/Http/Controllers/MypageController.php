<?php

namespace App\Http\Controllers;

use App\Application;

use App\Contract;
use App\Partners;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;

class MypageController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * @return mixed
     */
    public function dashBoard()
    {
        $loginUser = Auth::user();
        if (Auth::user()->PorC == "P") {
            // 지원한 프로젝트

            $appList = Application::where('u_id', '=', Auth::user()->id)->get();
            $app = array();
            for ($i = 0; $i < $appList->count(); $i++) {
                if ($appList[$i]->project->step == "게시" || $appList[$i]->project->step == "미팅")
                    $app[] = $appList[$i]->project;
            }


            //진행 중인 프로젝트
            $contractList = Contract::where('u_id', '=', Auth::user()->id)->get();
            $carryon = array();
            $compeleted = array();
            for ($i = 0; $i < $contractList->count(); $i++) {
                if ($contractList[$i]->project->step == "계약" || $contractList[$i]->project->step == "대금지급")
                    $carryon[] = $contractList[$i]->project;
                // 완료 프로젝트
                else if ($contractList[$i]->project->step == "완료" )
                    $compeleted[] = $contractList[$i]->project;
            }

            //완료 프로젝트
            return view('mypage/dashBoardP', compact('loginUser', 'app', 'carryon', 'compeleted'));

        } else {

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $checking = $projects->where('step', '=', '검수')->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $registered = $projects->where('step', '=', '게시')
                ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '미팅'))
                ->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $proceeding = $projects->where('step', '=', '계약')
                ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
                ->get();

            $projects = Project::where('Client_id', '=', Auth::user()->id);
            $done = $projects->where('step', '=', '완료')->get();
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
        $project = Project::where('id', '=', $id)->get();
        $loginUser = Auth::user();
        return view('mypage/applicant', compact('applist', 'loginUser', 'project'));
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
//        $app_carryon->choice = "진행";
//        $app_carryon->save();

        $contract = new Contract();
        $contract->u_id = $app_carryon->u_id;
        $contract->p_id = $app_carryon->p_id;
//        $contract->step = '계약';
        $contract->save();


        $app_carryon->project->step = "계약";
        $app_carryon->project->save();


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
