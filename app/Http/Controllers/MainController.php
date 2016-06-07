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
        $projects = $projects->get()->sortByDesc('updated_at');
        $projects = $projects->forPage(1,6);
        return view('index', compact('projects'));
    }

    public function notificationShow($id)
    {
        $noti = Notification::where('id', '=', $id)->get();
        return view('include.notification', compact('noti'));
    }

}
