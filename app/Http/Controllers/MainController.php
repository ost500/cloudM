<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Project;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $projects = new Project();

        $projects = $projects->where('step', '!=', '검수')->get();
        $projects = $projects->sortByDesc('updated_at');
        $projects = $projects->forPage(1, 6);
        return view('index', compact('projects'));
    }

    public function notificationShow()
    {
        $noti = Notification::all()->sortByDesc('updated_at');
        return view('include.notification', compact('noti'));
    }

}
