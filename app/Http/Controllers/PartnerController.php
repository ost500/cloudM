<?php

namespace App\Http\Controllers;

use App\Partners;
use App\Partners_job;
use App\User;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PartnerController extends Controller
{
    public function partner()
    {
        $partners = Partners::with('user');

        return view('partner/partner', compact('partners'));
    }

    public function partner_list($page, $option = "0", $option2 = "0", $keyword = "%")
    {
        $keyword1 = "";
        $keyword2 = "";
        $keyword3 = "";

        if ($keyword != "%") {
            $keyword1 = $keyword . "%";
            $keyword2 = "%" . $keyword;
            $keyword3 = "%" . $keyword . "%";
        }

//        $partners = Partners::with('user')->where('name','LIKE',$keyword)
//        Partners::with('user')->get()[0]->user->name
        $partners = new Collection();
        if ($option != 0 || $option2 != 0) {

//            $partner_all = Partners::with('partners_job');
            $job_name = "";
            switch ($option) {
                case 1:
                    $job_name = "네이버CPC";
                    break;
                case 2:
                    $job_name = "언론보도";
                    break;
                case 3:
                    $job_name = "구글광고";
                    break;
                case 4:
                    $job_name = "페이스북광고";
                    break;
                case 5:
                    $job_name = "매체 기타";
                    break;
                case 6:
                    $job_name = "네이버SEO";
                    break;
                case 7:
                    $job_name = "컨텐츠 배포";
                    break;
                case 8:
                    $job_name = "체험단 모집";
                    break;
                case 9:
                    $job_name = "바이럴 기타";
                    break;
                case 10:
                    $job_name = "블로그";
                    break;
                case 11:
                    $job_name = "페이스북페이지";
                    break;
                case 12:
                    $job_name = "기타SNS";
                    break;
                case 13:
                    $job_name = "홈페이지";
                    break;
                case 14:
                    $job_name = "운영대행 기타";
                    break;
                case 15:
                    $job_name = "개발";
                    break;
                case 16:
                    $job_name = "디자인";
                    break;
                case 17:
                    $job_name = "웹툰";
                    break;
                case 18:
                    $job_name = "영상";
                    break;
                case 19:
                    $job_name = "1회성 프로젝트 기타";
                    break;

               


            }


//            $partner_all = Partners::with('user');
            $job_name2 = "";

            switch ($option2) {
                case 5:
                    $job_name2 = "의료";
                    break;
                case 6:
                    $job_name2 = "법률";
                    break;
                case 7:
                    $job_name2 = "스타트업";
                    break;
                case 8:
                    $job_name2 = "프랜차이즈";
                    break;
                case 9:
                    $job_name2 = "교육/대학교";
                    break;
                case 10:
                    $job_name2 = "쇼핑몰";
                    break;
            }

            $has_partner_list = Partners::whereHas('job',
                function ($q) use ($job_name, $job_name2, $keyword) {
                    if ($job_name == "") {
                        $q->where('area', '=', $job_name2);
                    } else if ($job_name2 == "") {
                        $q->where('job', '=', $job_name);
                    } else {
                        $q->where('job', '=', $job_name)->where('area', '=', $job_name2);
                    }
                })->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'like', "%" . $keyword . "%");
            })->get();

//->whereExists(function ($query) use($keyword){
//                $query->from('users')
//                    ->where('name','like', "%".$keyword."%");
//            })->get();


//                ->from('users')->whereRaw('users.name like '. $keyword)->get();


            foreach ($has_partner_list as $each_partner) {
                $partners = $partners->push($each_partner->user);
            }


        } else {
            $partners = User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword)
                ->union(User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword1))
                ->union(User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword2))
                ->union(User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword3))
                ->get();
        }


        $count = $partners->count();
        $partners = $partners->forPage($page, 10);
        $partners['count'] = $count;
        return view('partner/partnerList', compact('partners'));
    }

    public function pagination($start, $end)
    {
        return view('pagination', ['start' => $start, 'end' => $end]);
    }

    public function detail($id)
    {
        $loginUser = Auth::user();
        $partner = Partners::find($id);
        $portfolios = $partner->portfolio->take(3);
        return view('partner/partner_detail', compact('loginUser', 'partner', 'portfolios'));
    }

    public function intro($id)
    {
        $partner = Partners::find($id);
        return view('partner/partner_intro', compact('partner'));
    }

    public function portfolio($id)
    {
        $partner = Partners::find($id);
        $portfolios = $partner->portfolio->take(3);
        return view('partner/partner_portfolio', compact('partner', 'portfolios'));
    }

    public function job($id)
    {
        $partner = Partners::find($id);
        return view('partner/partner_job', compact('partner'));
    }

    public function review($id)
    {
        $partner = Partners::find($id);
        return view('partner/partner_review', compact('partner'));
    }
}
