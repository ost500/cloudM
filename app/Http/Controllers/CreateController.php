<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CreateController extends Controller
{

    public $lastStep = "2";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($step)
    {
        if(Auth::user()->PorC == "P")
        {
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
                if(!Session::has('title'))
                    abort(503);
                break;

            case 2:
                Session::put('category', $request->input('category'));
                if(!Session::has('category'))
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
        return redirect()->action('CreateController@index', ['step' => $step+1]);
    }


    public function complete()
    {
        return view('p_add3');
    }

    public function indextesta(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->phone_num = $request->phone;
        $user->save();

        $client = $user->clients;
        $client->company_type = $request->company_type;
        $client->intro = $request->company_intro;
        $client->save();


        $input = new Project();
        $input->area = $request->area;
        $input->category = $request->category;
        $input->title = $request->project_name;
        $input->estimated_duration = $request->duration;
        $input->budget = $request->money;
        $input->purpose = $request->purpose;
        $input->detail_content = $request->content_detail;
        $input->deadline = $request->deadline;
        $input->expected_start_date = $request->expecting_start;
        $input->meeting_way = $request->pre_meeting;
        $input->managing_experience = $request->experience;
        $input->reason = $request->reason;
        $input->Client_id = Auth::user()->id;
        $input->save();

        echo $request->name."<br>";//
        echo $request->phone."<br>";//phone_num
        echo $request->company_type."<br>";//
        echo $request->company_intro."<br>";//
        echo $request->area."<br>";//area
        echo $request->category."<br>";//category
        echo $request->project_name."<br>";//title
        echo $request->duration."<br>";//estimated_duration
        echo $request->money."<br>";//budget
        echo $request->purpose."<br>";//plan_status
        echo nl2br($request->content_detail)."<br>";//detail_content
        echo $request->deadline."<br>";//
        echo $request->expecting_start."<br>";//expected_start_date
        echo $request->pre_meeting."<br>";//meeting_way
        echo $request->experience."<br>";//managing_experience
        echo $request->reason."<br>";//

        
    }
}
