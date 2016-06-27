<?php

namespace App\Http\Controllers;

use App\Application;

use App\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function application_form($id)
    {
        $detailProject = Project::where('id', '=', $id)->get();
        return view('p_application_form', compact('detailProject'));
    }

    public function application_post(Request $request, $pid)
    {


        $request->has_portfolio;

        $newApp = new Application();
        $newApp->u_id = Auth::user()->id;
        $newApp->p_id = $pid;
//        $newApp->money = $request->money;
//        $newApp->duration = $request->duration;
        $newApp->content = $request->contents;
        if ($request->has_portfolio)
            $newApp->has_portfolio = 1;
        else
            $newApp->has_portfolio = 0;
        $newApp->save();

        if ($request->hasFile('application_attach')) {
            $tmpFilePath = '/files/app_attach/';
            $tmpFileName = $newApp->id;


            $file = $request->file('application_attach');
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $newApp->file_name = $path;
            $newApp->origin_name = $request->file('application_attach')->getClientOriginalName();
        }

        $newApp->save();


        $appList = Application::where('p_id', '=', $pid)->get();
        $project = Project::find($pid);
        $project->applications_cnt = $appList->count();
        $project->save();
//
        return redirect()->action('MypageController@dashBoard');
    }
}
