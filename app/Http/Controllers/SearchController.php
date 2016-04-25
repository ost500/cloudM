<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Project;
use Illuminate\Contracts\Database\ModelIdentifier;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Illuminate\Pagination\Paginator;
use PhpParser\Node\Expr\Variable;



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

        $SearchOption = intval($SearchOption);
        
        if($SearchOption == 0){
            $projects = Project::all()->forPage(1,4);
//            $projects = Project::where('title','=',"GMLAB")->get();
            return view('p_search/p_searchSort', compact('projects'));
        }


        $optionArr=[];

        if(($SearchOption & 1) == true){
            $optionArr[] = "광고 의뢰";
        }
        if(($SearchOption & 2) == true){
            $optionArr[] = "운영 대행";
        }
        if(($SearchOption & 4) == true){
            $optionArr[] = "Viral";
        }
        if(($SearchOption & 8) == true){
            $optionArr[] = "1회성 프로젝트";
        }
        if(($SearchOption & 16) == true){
            $optionArr[] = "의료";
        }
        if(($SearchOption & 32) == true){
            $optionArr[] = "법률";
        }
        if(($SearchOption & 64) == true){
            $optionArr[] = "스타트업";
        }
        if(($SearchOption & 128) == true){
            $optionArr[] = "프랜차이즈";
        }
        if(($SearchOption & 256) == true){
            $optionArr[] = "교육/대학교";
        }
        if(($SearchOption & 512) == true){
            $optionArr[] = "쇼핑몰";
        }
        
        $query= new Project();
        for($i=0; $i<count($optionArr); $i++){
            if($i == 0){
                $query = $query->where('category','=',$optionArr[$i]);
            }
            else{
                $query = $query->union(Project::where('category','=',$optionArr[$i]));
            }
        }

        $projects = $query->get();

        return view('p_search/p_searchSort', compact('projects'));
        //blade view에서 projects 를 foreach문으로 돌리기로 했으므로 반드시 projects를 넘겨줘야 함

//        $projects = DB::table('projects')->whereln('category', $optionArr)-get();
//        $projects = Project::where('category','=',$eachcate)->union($projects);

//        $projects = Project::where('category','=',"바이럴")->get();


//        $projects = $projects->get()->sortBy('created_at');


//        $listrequest = $request->input('some');
//        $projectlist = Project:: where
//        return compact('projects');



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
