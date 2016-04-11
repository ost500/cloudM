<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class CreateController extends Controller
{

    public $lastStep = "3";

    public function index($step)
    {
        return view('p_add' . $step);
//        return phpinfo();
    }

    public function postCreate(Request $request, $step)
    {
        switch ($step) {
            case 2:

                Session::regenerate();

                Session::put('title', $request->input('title'));
                break;
            case 3:
                Session::put('category', $request->input('category'));
                break;

        }

        if ($step == $this->lastStep) {
            echo "passed step";
            $input = new Project();
            $input->title = Session::get('title');
            $input->category = Session::get('category');
            $input->save();
            Session::flush();
            return redirect()->action('CreateController@complete');

        }
        return redirect()->action('CreateController@index', ['step' => $step]);
    }


    public function complete()
    {
        return view('p_add3');
    }
}
