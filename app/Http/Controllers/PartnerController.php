<?php

namespace App\Http\Controllers;

use App\Partners;
use App\Partners_job;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;

class PartnerController extends Controller
{
    public function partner()
    {
        return view('partner/partner');
    }

    public function partner_list($page, $option = "0", $keyword = "%")
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
        if ($option != 0) {

            $job = Partners_job::with('partner.user');
            $job_name = "";
            switch ($option) {
                case 1:
                    $job_name = "광고의뢰";
                    break;
                case 2:
                    $job_name = "운영대행";
                    break;
                case 3:
                    $job_name = "Viral";
                    break;
                case 4:
                    $job_name = "1회성프로젝트";
                    break;
                case 5:
                    $job_name = "의료";
                    break;
                case 6:
                    $job_name = "법률";
                    break;
                case 7:
                    $job_name = "스타트업";
                    break;
                case 8:
                    $job_name = "프랜차이즈";
                    break;
                case 9:
                    $job_name = "교육/대학교";
                    break;
                case 10:
                    $job_name = "쇼핑몰";
                    break;

            }

            foreach ($job->where('job', '=', $job_name)->get() as $job_item) {
                $partners = $partners->push($job_item->partner->user);
            }

        } else {
            $partners = User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword)
                ->union(User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword1))
                ->union(User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword2))
                ->union(User::where('PorC', '=', 'P')->where('name', 'LIKE', $keyword3))
                ->get();
        }


        $partners['count'] = $partners->count();
        $partners->forPage($page, 10);
        return view('partner/partnerList', compact('partners'));
    }

    public function pagination($start, $end)
    {
        return view('pagination', ['start' => $start, 'end' => $end]);
    }

    public function detail($id)
    {
        $partner = Partners::with('user')->where('id', '=', $id)->get();
        return view('partner/partner_detail', compact('partner'));
    }
}
