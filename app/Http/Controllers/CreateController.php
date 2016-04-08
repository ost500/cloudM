<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests;

class CreateController extends Controller
{
    public function index()
    {
        return view('p_add1');
    }
    public function store(ProjectRequest $request)
    {
        $project = new Project;
        $project->title = $request->input('title');
        $project->save();


        return redirect()->action('CreateController@complete');
    }
    public function complete()
    {
        return view('p_add3');
    }
}
