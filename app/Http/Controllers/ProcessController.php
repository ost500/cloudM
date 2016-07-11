<?php

namespace App\Http\Controllers;

use App\Application;
use App\Communication;
use App\Contract;
use App\Interesting;
use App\Project;
use Auth;
use Illuminate\Database\Eloquent\Collection;
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

        $checking = $checking->sortByDesc('created_at');

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

        $temp = $temp->sortByDesc('created_at');
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

        $fail = $fail->sortByDesc('created_at');
        return view('mypage.projects_process_client.checking_fail', compact('loginUser', 'checking', 'temp', 'fail'));
    }

    public function posted_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $registered = $projects->where('step', '=', '게시')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '미팅'))
            ->get();

        $registered = $registered->sortByDesc('created_at');

        return view('mypage.projects_process_client.posted', compact('registered', 'loginUser'));
    }

    public function carry_on_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $proceeding = $projects->where('step', '=', '계약')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
            ->get();
        $proceeding = $proceeding->sortByDesc('created_at');
        return view('mypage.projects_process_client.carry_on', compact('loginUser', 'proceeding'));
    }

    public function carry_on_client_detail($id)
    {
        $loginUser = Auth::user();
        $project = Project::where('Client_id', '=', Auth::user()->id)->where('id', '=', $id)->get()->first();
        $contract = Contract::where('p_id', '=', $id)->get()->first();

        $pay['start'] = ($contract->start_pay_ratio) ? @number_format(($contract->contract_pay * ($contract->start_pay_ratio) / 100)) : 0;
        $pay['middle'] = ($contract->middle_pay_ratio) ? @number_format(($contract->contract_pay * ($contract->middle_pay_ratio) / 100)) : 0;
        $pay['finish'] = ($contract->finish_pay_ratio) ? @number_format(($contract->contract_pay * ($contract->finish_pay_ratio) / 100)) : 0;

        return view('mypage.projects_process_client.carry_on_detail', compact('loginUser', 'project', 'contract', 'pay'));
    }

    public function carry_on_pay_request(Request $request, $id)
    {
        $loginUser = Auth::user();
        $contract = Contract::where('id', '=', $id)->where('u_id', '=', $loginUser->id)->where('p_id', '=', $request['p_id'])->get()->first();

        if (empty($contract->id)) {
            return redirect("partner/project/carryon/$id");
        } else {
            $newContract = Contract::find($contract->id);

            if ($request['pay_type'] == "first") {
                $newContract->start_pay_request_date = date('Y-m-d');
            } else if ($request['pay_type'] == "middle") {
                $newContract->middle_pay_request_date = date('Y-m-d');
            } else if ($request['pay_type'] == "finish") {
                $newContract->finish_pay_request_date = date('Y-m-d');
            }

            $newContract->save();

            return redirect("partner/project/carryon/$contract->p_id");
        }
    }


    public function carry_on_pay_accept(Request $request, $id)
    {
        $loginUser = Auth::user();
        $project = Project::find($request['p_id']);

        if ($loginUser->id != $project->Client_id) {
            return redirect("client/project/carryon/$id");
        }

        $contract = Contract::where('id', '=', $id)->where('p_id', '=', $project->id)->get()->first();

        if (empty($contract->id)) {
            return redirect("partner/project/carryon/$id");
        } else {
            $newContract = Contract::find($contract->id);

            if ($request['pay_type'] == "first") {
                $newContract->start_pay_accept_date = date('Y-m-d');
            } else if ($request['pay_type'] == "middle") {
                $newContract->middle_pay_accept_date = date('Y-m-d');
            } else if ($request['pay_type'] == "finish") {
                $newContract->finish_pay_accept_date = date('Y-m-d');
            }

            $newContract->save();

            return redirect("client/project/carryon/$contract->p_id");
        }
    }


    public function done_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $done = $projects->where('step', '=', '완료')->get();
        $cancel = $projects->where('step', '=', '취소')->get();

        $done = $done->sortByDesc('created_at');
        return view('mypage.projects_process_client.done', compact('loginUser', 'done', 'cancel'));
    }

    public function cancel_client()
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $done = $projects->where('step', '=', '완료')->get();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $cancel = $projects->where('step', '=', '취소')->get();

        $cancel = $cancel->sortByDesc('created_at');
        return view('mypage.projects_process_client.done_cancel', compact('loginUser', 'done', 'cancel'));
    }


    public function apply_partner()
    {
        $loginUser = Auth::user();
        // 지원한 프로젝트

        $interesting = Interesting::where('u_id', Auth::user()->id)->get();

        $appList = Application::where('u_id', '=', Auth::user()->id)->get();
        $app = new Collection();
        $app_finished = new Collection();
        for ($i = 0; $i < $appList->count(); $i++) {
            if (($appList[$i]->project->step == "게시" || $appList[$i]->project->step == "미팅")
                && $appList[$i]->project->deadline <= date('Y-m-d')
            ){
                $app[] = $appList[$i];
            } else {
                $app_finished[] = $appList[$i];
            }
        }

        $app = $app->sortByDesc('created_at');
        $app_finished = $app_finished->sortBy('created_at');


        return view('mypage.projects_process_partner.apply', compact('loginUser', 'app', 'app_finished', 'interesting'));
    }

    public function interesting_partner()
    {
        $loginUser = Auth::user();
        //진행 중인 프로젝트

        $interestingList = Interesting::where('u_id', Auth::user()->id)->get();

        $interesting = new Collection();

        foreach ($interestingList as $item) {
            $interesting->push($item->project);
        }

        $appList = Application::where('u_id', '=', Auth::user()->id)->get();
        $app = array();
        $app_finished = array();
        for ($i = 0; $i < $appList->count(); $i++) {
            if (($appList[$i]->project->step == "게시" || $appList[$i]->project->step == "미팅")
                && $appList[$i]->project->deadline <= date('Y-m-d')
            ){
                $app_finished[] = $appList[$i];
            } else {
                $app[] = $appList[$i];
            }
        }

        $interesting = $interesting->sortByDesc('created_at');


        return view('mypage.projects_process_partner.interesting', compact('loginUser', 'app', 'app_finished', 'interesting'));
    }

    public function apply_finished_partner()
    {
        $loginUser = Auth::user();
        // 지원한 프로젝트

        $interesting = Interesting::where('u_id', Auth::user()->id)->get();

        $appList = Application::where('u_id', '=', Auth::user()->id)->get();
        $app = new Collection();
        $app_finished = new Collection();
        for ($i = 0; $i < $appList->count(); $i++) {
            if (($appList[$i]->project->step == "게시" || $appList[$i]->project->step == "미팅")
                && $appList[$i]->project->deadline <= date('Y-m-d')
            ) {
                $app[] = $appList[$i];
            } else {
                $app_finished[] = $appList[$i];
            }
        }

        $app = $app->sortByDesc('created_at');
        $app_finished = $app_finished->sortBy('created_at');

        return view('mypage.projects_process_partner.apply_finished', compact('loginUser', 'app', 'app_finished', 'interesting'));
    }

    public function carry_on_partner()
    {
        $loginUser = Auth::user();
        //진행 중인 프로젝트
        $contractList = Contract::where('u_id', '=', Auth::user()->id)->get();
        $carryon = new Collection();

        for ($i = 0; $i < $contractList->count(); $i++) {
            if ($contractList[$i]->project->step == "계약" || $contractList[$i]->project->step == "대금지급") {

                $appList = Application::where('u_id', '=', Auth::user()->id)->where('p_id', '=', $contractList[$i]->project->id)->get();

                $contractList[$i]->project->app = $appList[0];

                $carryon[] = $contractList[$i]->project;


            }
        }

        $carryon = $carryon->sortByDesc('created_at');

        return view('mypage.projects_process_partner.carry_on', compact('loginUser', 'carryon'));
    }

    public function carry_on_partner_detail($id)
    {
        $loginUser = Auth::user();

        //진행 중인 프로젝트
        $contract = Contract::where('u_id', '=', Auth::user()->id)->where('p_id', '=', $id)->get()->first();
        $project = Project::where('id', '=', $contract->p_id)->get()->first();

        $pay['start'] = ($contract->start_pay_ratio) ? @number_format(($contract->contract_pay * ($contract->start_pay_ratio) / 100)) : 0;
        $pay['middle'] = ($contract->middle_pay_ratio) ? @number_format(($contract->contract_pay * ($contract->middle_pay_ratio) / 100)) : 0;
        $pay['finish'] = ($contract->finish_pay_ratio) ? @number_format(($contract->contract_pay * ($contract->finish_pay_ratio) / 100)) : 0;

        return view('mypage.projects_process_partner.carry_on_detail', compact('loginUser', 'project', 'contract', 'pay'));
    }

    public function done_partner()
    {
        $loginUser = Auth::user();
        //진행 중인 프로젝트
        $contractList = Contract::where('u_id', '=', Auth::user()->id)->get();

        $compeleted = new Collection();
        for ($i = 0; $i < $contractList->count(); $i++) {
            // 완료 프로젝트
            if ($contractList[$i]->project->step == "완료")
                $compeleted[] = $contractList[$i]->project;
        }

        $compeleted = $compeleted->sortByDesc('created_at');

        return view('mypage.projects_process_partner.done', compact('loginUser', 'compeleted'));
    }
}
