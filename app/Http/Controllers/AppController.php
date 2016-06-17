<?php

namespace App\Http\Controllers;

use App\Application;
use App\Project;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function application_post($pid)
    {
        $newApp = new Application();
        $newApp->u_id = Auth::user()->id;
        $newApp->p_id = $pid;
        $newApp->save();


        // 지원자수 카운팅
        $appList = Application::where('p_id', '=', $pid)->get();
        $project = Project::find($pid);
        $project->applications_cnt = $appList->count();
        $project->save();

        return redirect()->action('MypageController@dashBoard');
    }
}
