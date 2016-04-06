<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function p_add($num)
    {
        return view('p_add'.$num);
    }
    
    public function p_search()
    {
        return view('p_search');
    }

    public function partner()
    {
        return view('partner');
        
    }
}
