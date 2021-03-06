<?php

namespace App\Http\Controllers;

use App\FaqMaster;
use Illuminate\Http\Request;

use App\Http\Requests;

class HowtouseController extends Controller
{
    public function services()
    {
        return view('howtouse/sidebar');
    }

    public function service_num($id)
    {
        return view('howtouse/sidebar_specific', ['number' => $id]);
    }

    public function serviceintro()
    {
        return view('howtouse/children/services');
    }

    public function partners_use()
    {
        return view('howtouse/children/partners-use');
    }

    public function client_use()
    {
        return view('howtouse/children/client-use');
    }

    public function charge()
    {
        return view('howtouse/children/charge');
    }

    public function faq()
    {
        $clients = FaqMaster::find(1)->faqs->sortBy('order_by');
        $partners = FaqMaster::find(2)->faqs->sortBy('order_by');
        return view('howtouse/children/faq', compact('clients', 'partners'));
    }
}
