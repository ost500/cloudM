<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class MypagePostController extends Controller
{
    public function setProfileimg(Request $request)
    {

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $tmpFilePath = '/files/userImage/';
            $tmpFileName = Auth::user()->id;
//            $ext = $file->guessExtension();
            $file->move(public_path() . $tmpFilePath, $tmpFileName);

            $path = $tmpFilePath . $tmpFileName;
            $user = Auth::user();
            $user->update(['profileImage' => $path]);
//            DB::table('users')->where(Auth::user())
//                ->update(['profileImage'=> $tmpFileName]);


        }


        return redirect()->action('MypageController@setting');
    }
}
