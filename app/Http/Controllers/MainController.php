<?php

namespace App\Http\Controllers;


use App\Notification;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;



class MainController extends Controller
{
    public function index(Request $request)
    {
        $projects = new Project();

        $projects = $projects->orWhere('step', '=', '게시')->orWhere('step', '=', '미팅')->get();
        $projects = $projects->sortByDesc('created_at')->sortByDesc('updated_at');
        $projects = $projects->forPage(1, 6);
        $count = 1;

        return view('index', compact('projects', 'count'));
    }

    public function notificationShow()
    {
        $noti = Notification::all()->sortByDesc('updated_at');
        return view('include.notification', compact('noti'));
    }

}
