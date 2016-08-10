<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectsArea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;


class CreateController extends Controller
{

    public $lastStep = "2";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($step)
    {
        if (Auth::user()->PorC == "P") {
            return redirect()->action('MainController@index');
        }
        $user = Auth::user();

        return view('p_add' . $step, compact('user'));
//        return phpinfo();
    }

    public function postCreate(Request $request, $step)
    {
        switch ($step) {
            case 1:
                Session::put('title', $request->input('title'));
                if (!Session::has('title'))
                    abort(503);
                break;

            case 2:
                Session::put('category', $request->input('category'));
                if (!Session::has('category'))
                    abort(503);
                break;

        }

        if ($step == $this->lastStep) {
            $input = new Project();
            $input->title = Session::pull('title');
            $input->category = Session::pull('category');
            $input->save();

            return redirect()->action('CreateController@complete');

        }
        return redirect()->action('CreateController@index', ['step' => $step + 1]);
    }


    public function complete()
    {
        return view('p_add3');
    }

    public function indextesta(Request $request)
    {
        $user = Auth::user();


        $client = $user->clients;
        $client->company_type = $request->company_type;
        $client->intro = $request->company_intro;
        $client->save();


        $input = new Project();

        $input->charger_name = $request->name;
        $input->charger_phone = $request->phone;

        $request->money = str_replace(',', '', $request->money);
        $request->money = str_replace('��', '', $request->money);


        //$input->area = $request->area;
        $input->category = $request->category;
        $input->title = $request->project_name;
        $input->estimated_duration = $request->duration;
        $input->budget = $request->money;
        $input->purpose = $request->purpose;
        $input->detail_content = $request->content_detail;
        $input->deadline = $request->deadline;
        $input->expected_start_date = $request->expecting_start;
        $input->meeting_way = $request->pre_meeting;
        $input->address_sido = $request->address_sido;
        $input->managing_experience = $request->experience;
        $input->reason = $request->reason;
        $input->Client_id = Auth::user()->id;
        $input->save();

        if ($request->hasFile('project_attach')) {

            $file = $request->file('project_attach');


            $tmpFilePath = '/files/project/';
            $tmpFileName = $input->id;
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $input->file_name = $path;
            $input->origin_name = $request->file('project_attach')->getClientOriginalName();
        }

        $input->save();

        for ($i = 0; $i < sizeof($request->area); $i++) {
            $areas = new ProjectsArea();
            $areas->p_id = $input->id;
            $areas->area = $request->area[$i];
            $areas->save();
        }

        $mail_data = array('email' => $user->email, 'name' => $user->name, 'title' => $input->title);
        echo $mail_data['title'] . $mail_data['email'] . $mail_data['name'];

        Mail::queue('mail.p_add_verifying_mail', ['project_name' => $mail_data['title']],
            function ($message) use ($mail_data) {
                $message->from('help@fastm.io', '패스트엠');
                $message->to($mail_data['email'], $mail_data['name'])
                    ->subject('[패스트엠] "' . $mail_data['title'] . '"캠페인 검수 중입니다');
            });
    }

    public function update_project_form($id)
    {
        $update_project = Project::find($id);
//        return view('p_detail_update', compact('update_project'));
        $update_project_area = $update_project->projects_area->keyBy('area');
        return view('project/project_detail_update', compact('update_project', 'update_project_area'));
    }

    public function update_project(Request $request)
    {
        $update_project = Project::find($request->id);
        $update_project->title = $request->project_name;
        $update_project->budget = $request->money;
        $update_project->estimated_duration = $request->duration;
        $update_project->deadline = $request->deadline;
        $update_project->purpose = $request->purpose;
        $update_project->managing_experience = $request->experience;
        $update_project->expected_start_date = $request->expecting_start;
        $update_project->meeting_way = $request->pre_meeting;
        $update_project->address_sido = $request->address_sido;
        $update_project->detail_content = $request->content_detail;

        $update_project->category = $request->category;
        $update_project->save();

        ProjectsArea::where('p_id', $request->id)->delete();

        for ($i = 0; $i < sizeof($request->area); $i++) {
            $areas = new ProjectsArea();
            $areas->p_id = $update_project->id;
            $areas->area = $request->area[$i];
            $areas->save();
        }

        return redirect()->back();
    }
}
