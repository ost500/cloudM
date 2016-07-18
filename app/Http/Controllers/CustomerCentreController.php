<?php

namespace App\Http\Controllers;


use App\ManToMan;
use App\Notification;
use Auth;
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

    public function man_to_man()
    {
        return view('customer_centre.man_to_man', ['try' => 'carry_on']);
    }

    public function man_to_man_post(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $new_man_to_man = new ManToMan();
        $new_man_to_man->u_id = Auth::user()->id;
        $new_man_to_man->title = $request->title;
        $new_man_to_man->content = $request->content_query;
        $new_man_to_man->save();

        return view('customer_centre.man_to_man', ['try' => 'success']);
    }

    public function notification_detail($id)
    {
        $notis = Notification::find($id);
        return view('customer_centre.notification_detail', compact('notis'));
    }

    public function agreement()
    {
        return view('customer_centre.agreement');
    }
    public function personal_info()
    {
        return view('customer_centre.personal_info');
    }

    public function email_confirm()
    {
        return view('auth.register_confirm_message');
    }


}
