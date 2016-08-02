<?php

namespace App\Http\Controllers;

use App\Application;

use App\Project;
use App\Contract;
use App\Interesting;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function application_form($id)
    {



        $user = Auth::user();
        $partners = $user->partners;

        $app = $user->app->where('p_id', (int)$id);
        if (!$app->isEmpty()) {
            return redirect("detail/$id");
        }

        $proposal_file = public_path() . $partners->proposal_file_name;
        $company_file = public_path() . $partners->company_file_name;

        $partnerFile['proposal'] = false;
        $partnerFile['company'] = false;


        if ($partners->proposal_file_name && file_exists($proposal_file)) {
            $partnerFile['proposal'] = true;

            if ($partners->proposal_check) {
                $partnerFile['proposal_origin_name'] = $partners->proposal_origin_name;
                $partnerFile['proposal_link'] = "profile/proposal/download/" . $user->id;
            } else {
                $partnerFile['proposal_origin_name'] = "패스트엠 검수중";
            }
        }


        if ($partners->company_file_name && file_exists($company_file)) {
            $partnerFile['company'] = true;

            if ($partners->company_check) {
                $partnerFile['company_origin_name'] = $partners->company_origin_name;
                $partnerFile['company_link'] = "profile/company/download/" . $user->id;
            } else {
                $partnerFile['company_origin_name'] = "패스트엠 검수중";
            }
        }

        $detailProject = Project::where('id', '=', $id)->get();


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

        return view('p_application_form', compact('detailProject', 'partnerFile', 'app', 'count'));
    }

    public function application_post(Request $request, $pid)
    {
        if (Session::has('app_lock')) {
            if (Session::get('app_lock') > date('H:i:s')) {
                Session::flash('message', "1분 후에 지원하실 수 있습니다");
                return redirect()->back();
            }
            Session::pull('app_lock');

        } else {
            $lock_time = new Datetime();
            $lock_time = $lock_time->modify("+1 minutes");
            Session::put('app_lock', $lock_time->format('H:i:s'));
        }

        $request->has_portfolio;

        $newApp = new Application();
        $newApp->u_id = Auth::user()->id;
        $newApp->p_id = $pid;
        $newApp->content = $request->contents;
        if ($request->has_portfolio)
            $newApp->has_portfolio = 1;
        else
            $newApp->has_portfolio = 0;
        $newApp->save();

        if ($request->hasFile('application_attach')) {
            $tmpFilePath = '/files/app_attach/';
            $tmpFileName = $newApp->id;


            $file = $request->file('application_attach');
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $newApp->file_name = $path;
            $newApp->origin_name = $request->file('application_attach')->getClientOriginalName();
        } else {
            $newApp->choice = "관리자 검수중";
        }

        $newApp->save();


        $appList = Application::where('p_id', '=', $pid)->get();
        $project = Project::find($pid);
        $project->applications_cnt = $appList->count();
        $project->save();


        // 관심 프로젝트 삭제
        $del_inter = Interesting::where('u_id', '=', Auth::user()->id)->where('p_id', '=', $pid);
        $del_inter->delete();

        return redirect()->action('MypageController@dashBoard');
    }

    public function application_attach_update_post(Request $request)
    {
        $validator = Validator::make(
            ['file' => $request->application_attach,
            ],
            ['file' => ['required', 'mimes:zip', 'max:10240'],

            ],
            ['required' => '필수 입력 입니다',
                'mimes' => 'zip 파일만 입력 가능합니다',
                'max' => '파일 사이즈를 확인하세요'
            ]
        );

        if ($validator->fails()) {
            if ($request->ajax()) {
                return $this->throwValidationException($request, $validator);
            }
            return redirect()->back()->withErrors($validator->errors());
        }

        $newApp = Application::find($request->app_id);

        if ($request->hasFile('application_attach')) {
            $tmpFilePath = '/files/app_attach/';
            $tmpFileName = $newApp->id;


            $file = $request->file('application_attach');
            $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $newApp->file_name = $path;
            $newApp->origin_name = $request->file('application_attach')->getClientOriginalName();
        }

        $newApp->save();

        return redirect()->action('ProcessController@apply_partner');
    }


    public function application_attach_download($id)
    {
        $newApp = Application::find($id);

        $filepath = addslashes($_SERVER['DOCUMENT_ROOT'] . $newApp->file_name);

        if (file_exists($filepath)) {
            ob_end_clean();

            if (!is_file($filepath) || !file_exists($filepath))
                echo '파일 없음.';


            $original = $newApp->origin_name;

            if (preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
                header("content-type: doesn/matter");
                header("content-length: " . filesize("$filepath"));
                header("content-disposition: attachment; filename=\"$original\"");
                header("content-transfer-encoding: binary");
            } else {
                header("content-type: file/unknown");
                header("content-length: " . filesize("$filepath"));
                header("content-disposition: attachment; filename=\"$original\"");
                header("content-description: php generated data");
            }
            header("pragma: no-cache");
            header("expires: 0");
            flush();

            $fp = fopen($filepath, 'rb');


            $download_rate = 10;

            while (!feof($fp)) {
                print fread($fp, round($download_rate * 1024));
                flush();
                usleep(1000);
            }
            fclose($fp);
            flush();
        }
    }


    public function company_file_download($id)
    {
        $newApp = Application::find($id);
        $filepath = public_path() . $newApp->user->partners->company_file_name;

        if (file_exists($filepath)) {
            ob_end_clean();

            if (!is_file($filepath) || !file_exists($filepath))
                echo '파일 없음.';


            $original = $newApp->user->partners->company_origin_name;

            if (preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
                header("content-type: doesn/matter");
                header("content-length: " . filesize("$filepath"));
                header("content-disposition: attachment; filename=\"$original\"");
                header("content-transfer-encoding: binary");
            } else {
                header("content-type: file/unknown");
                header("content-length: " . filesize("$filepath"));
                header("content-disposition: attachment; filename=\"$original\"");
                header("content-description: php generated data");
            }
            header("pragma: no-cache");
            header("expires: 0");
            flush();

            $fp = fopen($filepath, 'rb');


            $download_rate = 10;

            while (!feof($fp)) {
                print fread($fp, round($download_rate * 1024));
                flush();
                usleep(1000);
            }
            fclose($fp);
            flush();
        }
    }


    public function proposal_file_download($id)
    {
        $newApp = Application::find($id);
        $filepath = public_path() . $newApp->user->partners->proposal_file_name;

        if (file_exists($filepath)) {
            ob_end_clean();

            if (!is_file($filepath) || !file_exists($filepath))
                echo '파일 없음.';


            $original = $newApp->user->partners->proposal_origin_name;

            if (preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
                header("content-type: doesn/matter");
                header("content-length: " . filesize("$filepath"));
                header("content-disposition: attachment; filename=\"$original\"");
                header("content-transfer-encoding: binary");
            } else {
                header("content-type: file/unknown");
                header("content-length: " . filesize("$filepath"));
                header("content-disposition: attachment; filename=\"$original\"");
                header("content-description: php generated data");
            }
            header("pragma: no-cache");
            header("expires: 0");
            flush();

            $fp = fopen($filepath, 'rb');


            $download_rate = 10;

            while (!feof($fp)) {
                print fread($fp, round($download_rate * 1024));
                flush();
                usleep(1000);
            }
            fclose($fp);
            flush();
        }
    }
}
