<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Comments;
use App\Contract;
use App\Interesting;
use App\Project;

use App\ProjectsArea;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Mail;


class SearchController extends Controller
{

    public function p_search()
    {
        $projects = Project::where('step', '<>', '검수')->get();
//        $test = new Builder(DB::table('projects'));
//        $test2 = $test->paginate(5);
//        $projects = DB::table('projects')->paginate(5);

        return view('p_search/p_search', compact('projects'));
//        return view('p_search', compact('projects'));
//        return view('p_search', ['todos'=> $todos]);

    }

    public function detail($id)
    {
        if (!Auth::check()) {
            return redirect()->action('MainController@index');
        }
        $detailProject = Project::where('id', '=', $id)->get();
        $comment = Comments::where('project_id', '=', $id)->where('parent_id', 0);

        $client_id = $detailProject->first()->Client_id;


        $contracts = Contract::where("c_id", '=', $client_id)->get();
        $userProject = Project::where("Client_id", '=', $client_id)->get();

        $count['등록'] = $userProject->count();
        $count['계약'] = 0;
        $count['완료'] = 0;
        $count['진행'] = 0;
        $count['계약률'] = 0;
        foreach ($contracts as $contract) {
            if ($contract['step'] != "취소") $count['계약']++;
            if ($contract['step'] == "전체완료") $count['완료']++;
            if ($contract['step'] == "계약") $count['진행']++;
        }

        $count['계약률'] = round((($count['계약'] / $userProject->count()) * 100), 1);

        $login_user = Auth::user();


        //댓글 자격 확인
        if (Project::find($id)->client == $login_user) {
            //지금 프로젝트 클라이언트니?
            $comment_qulification = true;
        } else {
            if ($login_user->PorC == 'C') {
                //클라이언트니?
                $comment_qulification = false;
            } else {
                //파트너니?
                if ($login_user->partners->authenticated == 1) {
                    //신원 인증 받았니?
                    $comment_qulification = true;
                } else {
                    $comment_qulification = false;
                }
            }
        }


        return view('p_detail', compact('detailProject', 'comment', 'count', 'comment_qulification'));
    }

    public
    function pagination($start, $end)
    {
        return view('pagination', ['start' => $start, 'end' => $end]);
    }


    public
    function get_p_list($SearchOption, $SearchOption2, $page, $sort, $keyword = "%")
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
        $multi_select_binary = 17179869183;

        if ($SearchOption == $multi_select_binary || $SearchOption == 0) {

//            $projects = Project::all();
            $projects = Project::where("step", "!=", "검수")->where("step", "!=", "취소")->where("step","!=","등록 실패")
                ->where('title', 'LIKE', $keyword)
//                ->union(Project::where("step", "!=", "검수")->where('title','LIKE', $keyword1))
//                ->union(Project::where("step", "!=", "검수")->where('title','LIKE', $keyword2))
                ->union(Project::where("step", "!=", "검수")->where('step','!=',"취소")->where("step","!=","등록 실패")->where('title', 'LIKE', $keyword3))
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

            $filtered = $projects;


            $projects1 = $filtered->filter(function ($value) {
                if (($value->step == "게시" || $value->step == "미팅") && $value->deadline >= date('Y-m-d')) {
                    return $value;
                }
            });
            $projects2 = $filtered->filter(function ($value) {
                if (!(($value->step == "게시" || $value->step == "미팅") && $value->deadline >= date('Y-m-d'))) {
                    return $value;
                }
            });

            $projects = new Collection();
            foreach ($projects1 as $p) {
                $projects->push($p);
            }
            foreach ($projects2 as $p) {
                $projects->push($p);
            }


            $projects = $projects->forPage($page, 10);
            $projects['count'] = $count;


            return view('p_search/p_searchSort', compact('projects'));
        }


        $projects = new Collection();
        $area_menu_array = ['네이버CPC', '언론보도', '구글광고', '페이스북광고', '매체 기타',
            '네이버SEO', '컨텐츠 배포', '체험단 모집', '바이럴 기타',
            '블로그', '페이스북페이지', '기타SNS', '홈페이지', '운영대행 기타',
            '개발', '디자인', '웹툰', '영상', '1회성 프로젝트 기타',
            'TV광고', '신문광고', '라디오광고', '지하철광고', '버스광고', '잡지광고', '외부광고', '오프라인 기타'];

        $category_menu_array = ['의료', '법률', '스타트업', '프랜차이즈', '교육/대학교', '쇼핑몰', '기타'];


        for ($i = 0; $i < count($area_menu_array); $i++) {

            if (($SearchOption & (67108864 >> $i)) == true) {

                $query = ProjectsArea::where('area', '=', $area_menu_array[$i])->get();

                foreach ($query as $q) {
                    if ($q->project->step != '검수' && $q->project->step !='취소' && $q->project->step !='등록 실패') {
                        $projects = $projects->push($q->project);
                    }
                }

            }
        }
        for ($i = count($area_menu_array); $i < count($area_menu_array) + count($category_menu_array); $i++) {
            if (($SearchOption2 & (64 >> ($i + 1))) == true) {

                $query = Project::where('category', '=', $category_menu_array[$i - count($area_menu_array)])->get();

                foreach ($query as $q) {
                    if ($q->step != '검수' && $q->step != '취소' && $q->step != '등록 실패') {
                        $projects = $projects->push($q);
                    }
                }
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
        } else
            if ($sort == "2") {
                $projects = $projects->sortBy('budget');
            } else if ($sort == "3") {
                $projects = $projects->sortByDesc('updated_at');
            } else if ($sort == "4") {


                $projects = $projects->sortBy('deadline');
            } else {
                $projects = $projects->sortByDesc('updated_at');
            }

        $filtered = $projects;


        $projects1 = $filtered->filter(function ($value) {
            if (($value->step == "게시" || $value->step == "미팅") && $value->deadline >= date('Y-m-d')) {
                return $value;
            }
        });
        $projects2 = $filtered->filter(function ($value) {
            if (!(($value->step == "게시" || $value->step == "미팅") && $value->deadline >= date('Y-m-d'))) {
                return $value;
            }
        });

        $projects = new Collection();
        foreach ($projects1 as $p) {
            $projects->push($p);
        }
        foreach ($projects2 as $p) {
            $projects->push($p);
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

    public
    function postcomment(Request $request, $com_id)
    {
        $input = new Comments();
        $input->project_id = $request->input('project_id');
        $input->comment = $request->input('comment');
        $input->u_id = Auth::user()->id;
        if ($request->input('comment_status') != null) {
            $input->secret = true;
        }
        $input->parent_id = $com_id;
        $input->save();

        $subject = "HELLO OST";

//        $comments_mail_to = Comments::where('project_id', $input->project_id)->get();
//
//        foreach ($comments_mail_to as $mail_to) {
//            Mail::queue('mail.mail', ['key' => 'value'], function ($message) use ($subject, $mail_to) {
//                $message->from('help@fastm.io', 'Sender Name');
//                $message->to($mail_to->user->email, 'John Smith')
//                    ->subject($subject);
//            });
//        }
//
//
//        return $comments_mail_to;
        return redirect()->back();
    }

    public
    function delete_comment(Request $request)
    {
        $del_commnet = Comments::find($request->input('id'));
        $del_commnet->delete();
        return redirect()->back();
    }

    public
    function interesting($id)
    {
        if (Auth::user()->PorC == "C" ||
            Interesting::where('u_id', Auth::user()->id)->where('p_id', $id)->get()->isEmpty() == false
        ) {
            echo Interesting::where('u_id', Auth::user()->id)->where('p_id', $id)->get()->isEmpty();
            return response()->view('errors.503');
        }

        $new_inter = new Interesting();
        $new_inter->p_id = $id;
        $new_inter->u_id = Auth::user()->id;
        $new_inter->save();
        return redirect('/partner/project/interesting');
    }

}
