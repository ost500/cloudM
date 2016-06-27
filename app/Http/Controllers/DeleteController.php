<?php

namespace App\Http\Controllers;

use App\Application;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function delete_project(Request $request)
    {
        $del_project = Project::find($request->id);
        $del_project->step = "취소";
        $del_project->save();
        
        return redirect()->back();
    }
    public function delete_application(Request $request)
    {
        $del_app = Application::find($request->id);
        $del_app->delete();

        return redirect()->back();
    }
}
