<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Illuminate\Pagination\Paginator;


class SearchController extends Controller
{

    public function p_search()
    {
        $projects = Project::all();
//        $test = new Builder(DB::table('projects'));
//        $test2 = $test->paginate(5);
//        $projects = DB::table('projects')->paginate(5);

        return view('p_search/p_search');
//        return view('p_search', compact('projects'));
//        return view('p_search', ['todos'=> $todos]);

    }

    public function detail($id)
    {
        $detailProject = Project::where('id', '=', $id)->get();
        $comment = Comments::where('project_id', '=', $id)->get();
        return view('p_detail', compact('detailProject', 'comment'));
    }

    public function get_p_list($SearchOption)
    {

        if($SearchOption == "all")
            $projects = Project::all()->forPage(1,4);
        else {

            $second = Project::where('category','=',"광고대행");
            $projects = Project::where('category','=',$SearchOption)->union($second)->get()->sortBy('created_at');
        }


//        $listrequest = $request->input('some');
//        $projectlist = Project:: where
//        return compact('projects');
         
        return view('p_search/p_searchSort', compact('projects'));
    }

//    public function get_p_list($list)
//    {
//        $projects = Project::all();
//        return compact('projects');
//    }

    public function postcomment(Request $request)
    {
        $input = new Comments();
        $input->project_id = $request->input('project_id');
        $input->comment = $request->input('comment');
        $input->save();
        return back();
    }
}
