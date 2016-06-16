<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Validator;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class MypagePostController extends Controller
{
    public function setProfileimg(Request $request)
    {

        if ($request->hasFile('Image')) {

            $validator = Validator::make(
                ['Image' => $request->file('Image')],
                ['Image' => ['image', 'max:500']]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }


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

    public function set_profile_info(Request $request)
    {
        $validator = Validator::make(
            ['name' => $request->name],
            ['name' => ['required', 'max:255', 'unique:users,name']],
            ['required' => '이름은 필수 입니다',
                'max:255' => '255자 까지 입력할 수 있습니다 ',
                'unique' => '이미 있는 이름입니다']
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }


        Auth::user()->name = $request->name;
        Auth::user()->sex = $request->sex;
        Auth::user()->BOD = $request->BOD;
        Auth::user()->address = $request->address;
        Auth::user()->save();

        return redirect()->back();
    }

    public function set_numbers(Request $request)
    {
        $validator = Validator::make(
            ['phone_num1' => $request->phone_num1,
                'phone_num2' => $request->phone_num2,
                'phone_num3' => $request->phone_num3,
                'fax_num' => $request->fax_num],
            ['phone_num1' => ['required', 'max:4'],
                'phone_num2' => ['required', 'max:4'],
                'phone_num3' => ['required', 'max:4'],
                'fax_num' => ['max:12']],
            ['required' => '휴대폰 번호는 필수입니다',
                'max' => ':max 자리까지 입력 가능합니다']
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        Auth::user()->phone_num = $request->phone_num1.'-'.$request->phone_num2.'-'.$request->phone_num3;
        Auth::user()->fax_num = $request->fax_num;
        Auth::user()->save();

        return redirect()->back();
    }

}
