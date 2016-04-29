<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;

class PartnerController extends Controller
{
    public function partner()
    {
        return view('partner/partner');
    }
    public function partner_list($page, $option)
    {
        $partners = Partners::with('user')->get()->forPage($page,10);

        $partners['count'] = Partners::all()->count();
        return view('partner/partnerList', compact('partners'));
    }
    public function pagination($start, $end)
    {
        return view('pagination', ['start' => $start, 'end' => $end]);
    }
    public function detail($id)
    {
        $partner = Partners::with('user')->where('id','=',$id)->get();
        return view('partner/partner_detail', compact('partner'));
    }
}
