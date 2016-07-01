<?php

namespace App\Http\Controllers;

use App\Application;

use App\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function application_form($id)
    {
        $detailProject = Project::where('id', '=', $id)->get();
        return view('p_application_form', compact('detailProject'));
    }

    public function application_post(Request $request, $pid)
    {
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
        }

        $newApp->save();


        $appList = Application::where('p_id', '=', $pid)->get();
        $project = Project::find($pid);
        $project->applications_cnt = $appList->count();
        $project->save();
//
        return redirect()->action('MypageController@dashBoard');
    }

    public function application_attach_update_post(Request $request)
    {
        $validator = Validator::make(
            ['file' => $request->application_attach,
            ],
            ['file' => ['required', 'mimes:zip','max:10240'],

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

}
