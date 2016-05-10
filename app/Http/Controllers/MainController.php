<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function notificationShow($id)
    {
        $noti = Notification::where('id', '=', $id)->get();
        return view('include.notification', compact('noti'));
    }

}
