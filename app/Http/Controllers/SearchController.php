<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{

    public function p_search()
    {
        $projects = Project::all();

        return view('p_search', compact('projects'));
//        return view('p_search', ['todos'=> $todos]);
        
    }

    public function detail($id)
    {
        $detailProject = Project::where('id','=', $id)->get();
        $comment = Comments::where('project_id','=', $id)->get();
        return view('p_detail', compact('detailProject', 'comment'));
    }
    
    public function post_p_list()
    {
        
    }
    
    public function postcomment(Request $request)
    {
        $input = new Comments();
        $input->project_id = $request->input('project_id');
        $input->comment = $request->input('comment');
        $input->save();
        return back();
    }
}
