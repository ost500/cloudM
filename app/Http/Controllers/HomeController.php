<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests;
use App\Project;
use App\User;
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
        if($id == 1){
            $projects = Project::all();
            return view('admin.project',compact('projects'));
        }
        if($id == 2){
            $App = User::all();
            return view('admin.user', compact('App'));
        }
        if($id == 3){
            $App = Application::all();
            return view('admin.home', compact('App'));
        }

        
        return view('admin.home');
    }
    
    
    
}
