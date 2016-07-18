<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests;

class CompanyController extends Controller
{
    public function introduction()
    {
        return view('company.introduction');
    }

    public function news()
    {
        $news = News::all();
        return view('company.news', compact('news'));
    }

    public function news_view($id)
    {
        $notis = News::find($id);
        return view('company.news_view', compact('news'));
    }
}
