<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerCentreController extends Controller
{
    public function notification()
    {
        $notis = Notification::all();
        return view('customer_centre.notification_page', compact('notis'));
    }
    public function notification_detail($id)
    {
        $notis = Notification::find($id);
        return view('customer_centre.notification_detail', compact('notis'));
    }
}
