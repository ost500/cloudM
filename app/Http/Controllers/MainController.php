<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;

class MainController extends Controller
{
    public function index()
    {
    	return view('index');
    }
    
    public function p_search()
    {
        $projects = Project::all();

        return view('p_search', compact('projects'));
//        return view('p_search', ['todos'=> $todos]);
    }

    public function partner()
    {
        return view('partner');
        
    }
}
