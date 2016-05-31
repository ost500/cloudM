<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests;
use App\Project;
use App\User;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Auth::user()->PorC != 'A') {
            return redirect()->action('MainController@index');
        }


        if ($id == 0) {
            $projects = Project::where('step', '=', '검수')->get();
            return view('admin.check_project', compact('projects'));
        }

        if ($id == 1) {
            $projects = Project::all();
            return view('admin.project', compact('projects'));
        }
        if ($id == 2) {
            $App = User::all();
            return view('admin.user', compact('App'));
        }
        if ($id == 3) {
            $App = Application::all();
            return view('admin.home', compact('App'));
        }


        return view('admin.home');
    }

    public function post_project($id)
    {
        $post_project = Project::find($id);
        $post_project->step = "게시";
        $post_project->save();

        return redirect()->back();
    }

    public function step_change($id, $change)
    {
        
        $step_change = Project::find($id);

        $step_change->step = $change;

        $step_change->save();
        return redirect()->back();
    }
    
    public function gnuboard()
    {
        include(app_path()."/gnuboard5.1.18/index.php");

    }

}
