<?php

namespace App\Http\Controllers;


use App\Comments;
use App\Project;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{

    public function p_search()
    {
//        $projects = Project::all();
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

    public function pagination($start, $end)
    {
        return view('pagination', ['start' => $start, 'end' => $end]);
    }


    public function get_p_list($SearchOption, $page, $sort, $keyword = "%")
    {
        $SearchOption = intval($SearchOption);
        $page = intval($page);
//        $keyword1 ="";
//        $keyword2 = "";
        $keyword3 = "";

        if ($keyword != "%") {
//            $keyword1 = $keyword."%";
//            $keyword2 = "%".$keyword;
            $keyword3 = "%" . $keyword . "%";
        }

        if ($SearchOption == 0) {

//            $projects = Project::all();
            $projects = Project::where("step", "!=", "검수")
                ->where('title', 'LIKE', $keyword)
//                ->union(Project::where("step", "!=", "검수")->where('title','LIKE', $keyword1))
//                ->union(Project::where("step", "!=", "검수")->where('title','LIKE', $keyword2))
                ->union(Project::where("step", "!=", "검수")->where('title', 'LIKE', $keyword3))
                ->get();

            $count = $projects->count();

            //sort
            if ($sort == "1") {
                $projects = $projects->sortByDesc('budget');
            } else if ($sort == "2") {
                $projects = $projects->sortBy('budget');
            } else if ($sort == "3") {
                $projects = $projects->sortByDesc('updated_at');
            } else if ($sort == "4") {
                $projects = $projects->sortBy('deadline');
            } else {
                $projects = $projects->sortByDesc('updated_at');
            }

            $projects = $projects->forPage($page, 10);
            $projects['count'] = $count;

            return view('p_search/p_searchSort', compact('projects'));
        }


        $projects = new Collection();

        if (($SearchOption & 1) == true) {

            $query = Project::where('area', '=', '광고 의뢰')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 2) == true) {

            $query = Project::where('area', '=', '운영 대행')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 4) == true) {

            $query = Project::where('area', '=', 'Viral')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 8) == true) {

            $query = Project::where('area', '=', '1회성 프로젝트')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 16) == true) {

            $query = Project::where('category', '=', '의료')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 32) == true) {

            $query = Project::where('category', '=', '법률')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 64) == true) {

            $query = Project::where('category', '=', '스타트업')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 128) == true) {

            $query = Project::where('category', '=', '프랜차이즈')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 256) == true) {

            $query = Project::where('category', '=', '교육/대학교')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }
        if (($SearchOption & 512) == true) {

            $query = Project::where('category', '=', '쇼핑몰')->where('step', '!=', '검수')->get();

            foreach ($query as $q) {
                $projects = $projects->push($q);
            }
        }

        $projects = $projects->unique('id');

//        for ($i = 0; $i < count($optionArr); $i++) {
//            if ($i == 0) {
//                $query = $query->where('category', '=', $optionArr[$i])->where('step', '!=', '검수');
//            } else {
//                $query = $query->union(Project::where('category', '=', $optionArr[$i])
//                    ->where('step', '!=', '검수'));
//            }
//        }

//        $projects = $query->get();


        if ($sort == "1") {
            $projects = $projects->sortByDesc('budget');
        } else if ($sort == "2") {
            $projects = $projects->sortBy('budget');
        } else if ($sort == "3") {
            $projects = $projects->sortByDesc('updated_at');
        } else if ($sort == "4") {
            $projects = $projects->sortBy('deadline');
        } else {
            $projects = $projects->sortByDesc('updated_at');
        }
        $count = $projects->count();
        $projects = $projects->forPage($page, 10);
        $projects['count'] = $count;

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
        $input->u_id = Auth::user()->id;
        if ($request->input('comment_status') != null) {
            $input->secret = true;
        }
        $input->save();
        return back();
    }
    public function delete_comment(Request $request)
    {
        $del_commnet = Comments::find($request->input('id'));
        $del_commnet->delete();
        return redirect()->back();
    }
}
