<?php

namespace App\Http\Controllers;

use App\Application;

use App\Contract;
use App\Partners;
use App\Partners_job;
use App\Portfolio;
use App\Project;
use App\ProjectsProposal;
use App\Skill;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;
use Validator;

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
                    $app[] = $appList[$i];
            }


            //진행 중인 프로젝트
            $contractList = Contract::where('u_id', '=', Auth::user()->id)->get();
            $carryon = array();
            $compeleted = array();
            for ($i = 0; $i < $contractList->count(); $i++) {
                if ($contractList[$i]->project->step == "계약" || $contractList[$i]->project->step == "대금지급")
                    $carryon[] = $contractList[$i]->project;
                // 완료 프로젝트
                else if ($contractList[$i]->project->step == "완료")
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
        $meeting_proposal = Application::find($request->id);
        $meeting_proposal->project->step = "미팅";
        $meeting_proposal->project->save();

        $meeting_proposal->choice = "미팅";
        $meeting_proposal->save();

        return redirect()->back();
    }

    public function meetingCancel(Request $request)
    {
        $meeting_proposal = Application::find($request->id);
        $meeting_proposal->project->step = "게시";
        $meeting_proposal->project->save();

        $meeting_proposal->choice = "지원";
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
            $portfolios = $loginUser->partners->portfolio->take(3);
            return view('mypage/mypage', compact('loginUser', 'portfolios'));
        } else {
            $loginUser = Auth::user();
            return view('mypage/mypage', compact('loginUser'));
        }

    }

    public function mypage_intro_edit()
    {
        return view('mypage/profile_edit/intro_edit');
    }

    public function mypage_intro_edit_post(Request $request)
    {
        //validate
        $validator = Validator::make(
            ['intro' => $request->intro],
            ['intro' => ['required', 'max:5000']],
            ['required' => '자기소개는 필수 입니다',
                'max' => '5000자 까지 입력할 수 있습니다']
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        //save

        Auth::user()->partners->intro = $request->intro;
        Auth::user()->partners->save();

        return redirect()->back();
    }

    public function mypage_skill_edit_post(Request $request)
    {
        $validator = Validator::make(
            ['title' => $request->title,
                'number' => $request->number,
                'experience' => $request->experience],
            ['title' => ['required', 'max:255'],
                'number' => ['required', 'integer', 'max:255'],
                'experience' => ['required', 'max:255']],
            ['required' => '필수 입력 입니다',
                'integer' => '숫자만 입력 가능합니다',
                'max' => '너무 많이 입력하셨습니다']
        );

        if ($validator->fails()) {
            if ($request->ajax()) {
                return $this->throwValidationException($request, $validator);
            }
            return redirect()->back()->withErrors($validator->errors());
        }

        $job = new Partners_job();
        $job->partner_id = Auth::user()->partners->id;
        $job->job = $request->title;
        $job->number = $request->number;
        $job->experience = $request->experience;
        $job->save();

        foreach (Auth::user()->partners->job()->get() as $job) {
            echo "<tr>";
            echo "<td>" . $job->job . "</td>";
            echo "<td>" . $job->number . "</td>";
            echo "<td>" . $job->experience . "</td>";
            echo "<tr>";
        }


    }

    public function mypage_skill_del_post(Request $request)
    {
        $del_skill = Partners_job::find($request->id);
        $del_skill->delete();
    }

    public function skills_list()
    {
        foreach (Auth::user()->partners->job()->get() as $job) {
            echo "<tr>";
            echo "<td>" . $job->job .
                "<form style=\"display: inline;\"
                      id=\"del_form" . $job->id . "\"
                      method=\"POST\"
                      
                      onsubmit=\"return confirm('삭제하시겠습니까?');\">" .
                csrf_field() . "
                    <input name=\"id\" hidden
                           value=\"" . $job->id . "\">
                    <i style=\"cursor: pointer\"
                       id=\"" . $job->id . "button\"
                       class=\"fa fa-times fa-lg\"></i>
                </form>
                <script>
                    $(\"#" . $job->id . "button\").click(function () {
                        $.ajax({
                            type: 'POST',
                            url: '/mypage/skill_delete',
                            data: $(\"#del_form" . $job->id . "\").serialize(),
                            success: function (data) {
                                $.ajax({
                                        type:'GET',
                                        url: '/mypage/skill_list',
                                        success: function(data){
                                            $(\"#skill_list\").html(data);
                                        }
                                    })
                                
                                }
                            });
                        
                    });
                </script>"
                . "</td>";
            echo "<td>" . $job->number . "</td>";
            echo "<td>" . $job->experience . "</td>";
            echo "<tr>";
        }
    }

    public function portfolio($id)
    {
        $loginUser = User::find($id);
        $portfolios = $loginUser->partners->portfolio;

        return view('mypage/portfolio/portfolio_list', compact('loginUser', 'portfolios'));
    }

    public function portfolio_detail($id)
    {

        $loginUser = Auth::user();
        $portfolios = Portfolio::find($id);


        return view('mypage/portfolio/portfolio_detail', compact('loginUser', 'portfolios'));
    }

    public function portfolio_create()
    {
        if (Auth::user()->PorC != "P"){
            return redirect()->back();
        }
        $loginUser = Auth::user();

        return view('mypage/portfolio/portfolio_create', compact('loginUser'));
    }

    public function portfolio_create_post(Request $request)
    {
        $new_port = new Portfolio();
        $new_port->title = $request->title;
        $new_port->iscloudm = $request->checkbox1;
        $new_port->area = $request->area;
        $new_port->category = $request->category;
        $new_port->description = $request->description;
        $new_port->from_date = $request->from_date;
        $new_port->to_date = $request->to_date;
        $new_port->participation_rate = $request->participation_rate;
        if ($request->checkbox1 == null) {
            $new_port->iscloudm = false;
        } else {
            $new_port->iscloudm = $request->checkbox1;
        }

        $new_port->partner_id = Auth::user()->partners->id;
        $new_port->save();

//
//
//        echo $request->image123;
        $file = $request->file('image1');

        $tmpFilePath = '/files/portfolio/';
        $tmpFileName = $new_port->partner_id . "_" . $new_port->id . "_1";
        $file->move(public_path() . $tmpFilePath, $tmpFileName);
        $path = $tmpFilePath . $tmpFileName;
        $new_port->image1 = $path;

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $tmpFileName = $new_port->partner_id . "_" . $new_port->id . "_2";
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $new_port->image2 = $path;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $tmpFileName = $new_port->partner_id . "_" . $new_port->id . "_3";
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $new_port->image3 = $path;
        }

        $new_port->save();

        return redirect()->action('MypageController@portfolio',[Auth::user()->id]);
    }

    public function portfolio_delete(Request $request)
    {
        $del_portfolio = Portfolio::find($request->id);
        $del_portfolio->delete();

    }
    public function portfolio_update($id)
    {
        if (Portfolio::find($id)->partner->user->id != Auth::user()->id){
            return response()->view('errors.503');
        }
        $loginUser = Auth::user();
        $portfolio = Portfolio::find($id);

        return view('mypage/portfolio/portfolio_update', compact('loginUser','portfolio'));

    }

    public function portfolio_update_post(Request $request, $id)
    {
        $new_port = Portfolio::find($id);
        $new_port->title = $request->title;
        $new_port->iscloudm = $request->checkbox1;
        $new_port->area = $request->area;
        $new_port->category = $request->category;
        $new_port->description = $request->description;
        $new_port->from_date = $request->from_date;
        $new_port->to_date = $request->to_date;
        $new_port->participation_rate = $request->participation_rate;
        if ($request->checkbox1 == null) {
            $new_port->iscloudm = false;
        } else {
            $new_port->iscloudm = $request->checkbox1;
        }

        $new_port->partner_id = Auth::user()->partners->id;
        $new_port->save();

        if ($request->hasFile('image2') ) {
//        echo $request->image123;
            $file = $request->file('image1');

            $tmpFilePath = '/files/portfolio/';
            $tmpFileName = $new_port->partner_id . "_" . $new_port->id . "_1";
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $new_port->image1 = $path;
        }

        if ($request->hasFile('image2') ) {
            $file = $request->file('image2');
            $tmpFileName = $new_port->partner_id . "_" . $new_port->id . "_2";
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $new_port->image2 = $path;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $tmpFileName = $new_port->partner_id . "_" . $new_port->id . "_3";
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $new_port->image3 = $path;
        }

        $new_port->save();

        return redirect()->action('MypageController@portfolio_detail',[$new_port->id]);

    }




    public function setting()
    {
        $loginUser = Auth::user();

        $loginUser->phone_num_arr = explode("-", $loginUser->phone_num);
        if(!$loginUser->phone_num){
            $loginUser->phone_num_arr = array("","","");
        }

        return view('mypage/setting', compact('loginUser'));
    }




    public function proposalFileUpload(Request $request)
    {
        if ($request->hasFile('proposal_file')) {
            $proposal = new ProjectsProposal();
            $loginUser = Auth::user();


            $tmpFilePath = '/files/proposals/';

            $file = $request->file('proposal_file');

            $chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));
            shuffle($chars_array);
            $shuffle = implode('', $chars_array);

            // 첨부파일 첨부시 첨부파일명에 공백이 포함되어 있으면 일부 PC에서 보이지 않거나 다운로드 되지 않는 현상이 있습니다.
            $tmpFileName = abs(ip2long($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.str_replace('%', '', urlencode(str_replace(' ', '_', $file->getClientOriginalName())));
            $file->move(public_path() . $tmpFilePath, $tmpFileName);

            $proposal->u_id = $loginUser->id;
            $proposal->p_id = $request->p_id;
            $proposal->source_name = $file->getClientOriginalName();
            $proposal->file_name = $tmpFileName;
            $proposal->file_size = $file->getSize();
            $proposal->save();
        }

        return redirect()->action('MypageController@dashBoard');
    }

}
