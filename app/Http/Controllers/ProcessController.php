<?php

namespace App\Http\Controllers;

use App\Application;
use App\Contract;
use App\Project;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function checking_client()
    {
        if (Auth::user()->PorC != "C") {
            return response()->view('errors.503');
        }
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $checking = $projects->where('step', '=', '검수')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $temp = $projects->where('step', '=', '임시 저장')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $fail = $projects->where('step', '=', '등록 실패')->get();

        return view('mypage.projects_process_client.checking', compact('loginUser', 'checking', 'temp', 'fail'));
    }

    public function temp_client()
    {
        if (Auth::user()->PorC != "C") {
            return response()->view('errors.503');
        }
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $checking = $projects->where('step', '=', '검수')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $temp = $projects->where('step', '=', '임시 저장')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $fail = $projects->where('step', '=', '등록 실패')->get();
        return view('mypage.projects_process_client.checking_temp', compact('loginUser', 'checking', 'temp', 'fail'));
    }

    public function fail_client()
    {
        if (Auth::user()->PorC != "C") {
            return response()->view('errors.503');
        }
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $checking = $projects->where('step', '=', '검수')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $temp = $projects->where('step', '=', '임시 저장')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $fail = $projects->where('step', '=', '등록 실패')->get();
        return view('mypage.projects_process_client.checking_fail', compact('loginUser', 'checking', 'temp', 'fail'));
    }

    public function posted_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $registered = $projects->where('step', '=', '게시')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '미팅'))
            ->get();

        return view('mypage.projects_process_client.posted', compact('registered', 'loginUser'));
    }

    public function carry_on_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $proceeding = $projects->where('step', '=', '계약')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
            ->get();
        return view('mypage.projects_process_client.carry_on', compact('loginUser', 'proceeding'));
    }

    public function done_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $done = $projects->where('step', '=', '완료')->get();
        $cancel = $projects->where('step', '=', '취소')->get();
        return view('mypage.projects_process_client.done', compact('loginUser', 'done', 'cancel'));
    }

    public function cancel_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $done = $projects->where('step', '=', '완료')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $cancel = $projects->where('step', '=', '취소')->get();
        return view('mypage.projects_process_client.done_cancel', compact('loginUser', 'done', 'cancel'));
    }


    public function apply_partner()
    {
        $loginUser = Auth::user();
        // 지원한 프로젝트

        $appList = Application::where('u_id', '=', Auth::user()->id)->get();
        $app = array();
        for ($i = 0; $i < $appList->count(); $i++) {
            if ($appList[$i]->project->step == "게시" || $appList[$i]->project->step == "미팅")
                $app[] = $appList[$i];
        }

        return view('mypage.projects_process_partner.apply', compact('loginUser', 'app'));
    }

    public function carry_on_partner()
    {
        $loginUser = Auth::user();
        //진행 중인 프로젝트
        $contractList = Contract::where('u_id', '=', Auth::user()->id)->get();
        $carryon = array();

        for ($i = 0; $i < $contractList->count(); $i++) {
            if ($contractList[$i]->project->step == "계약" || $contractList[$i]->project->step == "대금지급")
                $carryon[] = $contractList[$i]->project;
        }

        return view('mypage.projects_process_partner.carry_on', compact('loginUser', 'carryon'));
    }

    public function done_partner()
    {
        $loginUser = Auth::user();
        //진행 중인 프로젝트
        $contractList = Contract::where('u_id', '=', Auth::user()->id)->get();

        $compeleted = array();
        for ($i = 0; $i < $contractList->count(); $i++) {
            // 완료 프로젝트
            if ($contractList[$i]->project->step == "완료")
                $compeleted[] = $contractList[$i]->project;
        }
        return view('mypage.projects_process_partner.done', compact('loginUser', 'compeleted'));
    }
}
