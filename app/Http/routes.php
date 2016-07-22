<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Client;
use App\Partners;
use App\User;

Route::get('/', ['as' => "home", 'uses' => 'MainController@index']);

//프로젝트 등록
Route::post('/p_add', 'CreateController@indextesta');
//Route::get('/p_add/complete', 'CreateController@complete');
//Route::post('/p_add/{step}', 'CreateController@postCreate');
Route::get('/p_add/{step}', 'CreateController@index');

//프로젝트 수정
Route::get('/p_update/{id}', 'CreateController@update_project_form')
    ->where(['id' => '[0-9]+']);
Route::post('/p_update', 'CreateController@update_project');


//프로젝트
Route::get('/project', 'SearchController@p_search');
//프로젝트 list
Route::get('/project/{SearchOption}/{SearchOption2}/{page?}/{sort?}/{keyword?}', 'SearchController@get_p_list')
    ->where(['SearchOption' => '[0-9]+', 'SearchOption2' => '[0-9]+', 'page' => '[0-9]+', 'sort' => '[1-4]']);
//프로젝트 pagination
Route::get('/project/pagination/{start}/{end}', 'SearchController@pagination');
//프로젝트 상세화면
Route::get('/detail/{id}', 'SearchController@detail')
    ->where(['id' => '[0-9]+']);
//관심 프로젝트
Route::post('/detail/{id}/interesting', ['as' => 'interesting_add', 'uses' => 'SearchController@interesting'])
    ->where(['id' => '[0-9]+']);


// 댓글
Route::post('/commentadd/{com_id}', ['as' => 'comment_post', 'uses' => 'SearchController@postcomment'])
    ->where(['com_id' => '[0-9]+']);
// 댓글 삭제
Route::post('/commentdel', 'SearchController@delete_comment');


//파트너
Route::get('/partner', 'PartnerController@partner');
Route::get('/partner2', 'PartnerController@partner_temp');

Route::get('/partner/{id}', 'PartnerController@detail')
    ->where(['id' => '[0-9]+']);

Route::get('/partner/{id}/intro', 'PartnerController@intro')
    ->where(['id' => '[0-9]+']);

Route::get('/partner/{id}/portfolio', 'PartnerController@portfolio')
    ->where(['id' => '[0-9]+']);

Route::get("/partner/{user_id}/portfolio/{id}", ['as' => 'partner_portfolio_detail', 'uses' => 'PartnerController@portfolio_detail'])
    ->where(['user_id' => '[1-9]+'])
    ->where(['id' => '[1-9]+']);


Route::get('/partner/{id}/job', 'PartnerController@job')
    ->where(['id' => '[0-9]+']);

Route::get('/partner/{id}/review', 'PartnerController@review')
    ->where(['id' => '[0-9]+']);

//파트너 list
Route::get('/partner/{page}/{option}/{option2}/{keyword?}', 'PartnerController@partner_list')
    ->where(['page' => '[0-9]+']);


//프로젝트 pagination
Route::get('/project/pagination/{start}/{end}', 'SearchController@pagination');


//이용방법
Route::get('/services/', 'HowtouseController@services');
Route::get('/services/{id}', 'HowtouseController@service_num')
    ->where(['id' => '[1-5]']);

Route::get('/serviceintro', 'HowtouseController@serviceintro');
Route::get('/client-use', 'HowtouseController@client_use');
Route::get('/partner-use', 'HowtouseController@partners_use');
Route::get('/charge', 'HowtouseController@charge');
Route::get('/faq', 'HowtouseController@faq');


//로그인
Route::auth();
//이메일 확인
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);

Route::get('facebook', function (Request $request) {
    echo $_GET['a'];
    return "<a href='fbauth'>페이스북 로그인</a>";
});

Route::get('/fbauth/{auth?}', function ($auth = NULL) {
    if ($auth == 'auth') {
        try {
            Hybrid_Endpoint::process();
        } catch (Exception $e) {
            return Redirect::to('fbauth');
        }
        return;
    }

    try {
        $oauth = new Hybrid_Auth(config_path() . '/fb_auth.php');
        $provider = $oauth->authenticate('Facebook');
        $profile = $provider->getUserProfile();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    echo $profile->firstName . ' ' . $profile->lastName . '<br>';
    echo $profile->email . '<br>';
    echo $profile->emailVerified . '<br>';

    $profile_save = array('email'=>$profile->email);

    $vali = Validator::make($profile_save, [
        'email' => 'unique:users',
    ]);
    if (!$vali->fails()) {
        if (Session::pull("PorC") == "C") {
            $userCreation = User::create([
                'name' => $profile->firstName,
                'nick' => $profile->firstName,
                'email' => $profile->email,
                'PorC' => "C",
                'profileImage' => '/files/userImage/default',
                'confirmed' => 1
            ]);
            Client::create([
                'user_id' => $userCreation['id']
            ]);
        } else {
            $userCreation = User::create([
                'name' => $profile->firstName,
                'nick' => $profile->firstName,
                'email' => $profile->email,
                'PorC' => "P",
                'profileImage' => '/files/userImage/default',
                'confirmed' => 1
            ]);
            Partners::create([
                'user_id' => $userCreation['id']
            ]);
        }
        Auth::loginUsingId($userCreation['id']);

        return redirect()->action("MainController@index");
    }

    Auth::loginUsingId(User::where('email',$profile->email)->get()->first()->id);

    return redirect()->action("MainController@index");

});

Route::get('/loginModal', 'MainController@loginModal');

Route::get('/notification', 'MainController@notificationShow');

// mypage
Route::get('/dashboard', 'MypageController@dashBoard');

Route::get('/client/project/applist/{id}', 'MypageController@applicationList')
    ->where(['id' => '[0-9]+']);
// meeting proposal
Route::post('/applist/meeting', 'MypageController@meetingProposal');
// meeting cancel
Route::post('/applist/meetingCancel', 'MypageController@meetingCancel');
// contract
Route::post('/applist/contract', 'MypageController@contract');

Route::post('/applist/interest', 'MypageController@meetingInterest');
Route::post('/applist/out', 'MypageController@meetingOut');


Route::get('/setting', 'MypageController@setting');

Route::get('/setting/profile', 'MypageController@setting');
Route::get('/setting/auth', 'MypageController@settingAuth');
Route::get('/setting/bank', 'MypageController@settingBank');
Route::get('/setting/password', 'MypageController@settingPassword');
Route::get('/setting/notification', 'MypageController@settingNotification');
Route::get('/setting/passwordChange', 'MypageController@settingPasswordChange');


// delete project
Route::post('/rm_project', 'DeleteController@delete_project');
// delete Application
Route::post('/rm_app', 'DeleteController@delete_application');

// mypage post
Route::post('/mypage/img', 'MypagePostController@setProfileimg');

// mypage post
Route::post('/setting/auth/save', 'MypagePostController@setProfileAuthimg');

// User info
Route::post('/setting/profile/save', 'MypagePostController@set_profile_info');

// User bank
Route::post('/setting/bankEdit', 'MypagePostController@set_bank');

// User password check
Route::post('/setting/passwordCheck', 'MypagePostController@password_check');

// User password update
Route::post('/setting/passwordUpdate', 'MypagePostController@password_update');

// User notification update
Route::post('/setting/notification/email/save', 'MypagePostController@notification_email_update');
Route::post('/setting/notification/sms/save', 'MypagePostController@notification_sms_update');


// 제안서/견적서 업로드
Route::post('/proposalFileUpload', 'MypageController@proposalFileUpload');

//프로필
Route::get('/profile', 'MypageController@profile');

Route::get('/profile/proposal', 'MypageController@profileProposal');
Route::get('/profile/company', 'MypageController@profileCompany');

Route::post('/profile/proposal/save', 'MypagePostController@proposal_update');
Route::post('/profile/company/save', 'MypagePostController@company_update');

//프로필 포트폴리오 create
Route::get("/profile/portfolio/create", 'MypageController@portfolio_create');
Route::post("/profile/portfolio/create", 'MypageController@portfolio_create_post');
//프로필 포트폴리오 자세히 list

Route::get("/profile/portfolio/list/{id}", ['as' => 'profile_portfolio_list', 'uses' => 'MypageController@portfolio'])
    ->where(['id' => '[0-9]+']);
Route::get("/partner/portfolio/list/{id}", 'MypageController@portfolio')
    ->where(['id' => '[0-9]+']);

// 프로필 포트폴리오 detail
Route::get("/profile/portfolio/{id}", ['as' => 'portfolio_detail', 'uses' => 'MypageController@portfolio_detail'])
    ->where(['id' => '[0-9]+']);


Route::post("/profile/portfolio/delete/{id}", ['as' => 'portfolio_del', 'uses' => 'MypageController@portfolio_delete'])
    ->where(['id' => '[0-9]+']);
Route::get("/profile/portfolio/update/{id}", 'MypageController@portfolio_update')
    ->where(['id' => '[0-9]+']);
Route::post("/profile/portfolio/update/{id}", 'MypageController@portfolio_update_post')
    ->where(['id' => '[0-9]+']);


//프로필 edit intro
Route::get('/profile/intro/edit', 'MypageController@profile_intro_edit');
Route::post('/profile/intro/edit', 'MypageController@profile_intro_edit_post');
//프로필 edit skill
Route::post('/profile/skill/edit', 'MypageController@profile_skill_edit_post');
Route::post('/profile/skill/delete', 'MypageController@profile_skill_del_post');
//프로필 skill list
Route::get("/profile/skill/list", 'MypageController@profile_skill_list');


// application
Route::get('/apply/{id}/application', 'AppController@application_form')
    ->where(['id' => '[0-9]+']);

Route::post('/apply/attach_update', 'AppController@application_attach_update_post');

Route::post('/apply/{pid}', 'AppController@application_post')
    ->where(['pid' => '[0-9]+']);

Route::get('/apply/application_attach/{id}', 'AppController@application_attach_download')
    ->where(['id' => '[1-9]+']);

Route::get('/apply/download/{id}', 'AppController@application_attach_download')
    ->where(['id' => '[1-9]+']);

Route::get('/apply/download/company/{id}', 'AppController@company_file_download')
    ->where(['id' => '[1-9]+']);

Route::get('/apply/download/proposal/{id}', 'AppController@proposal_file_download')
    ->where(['id' => '[1-9]+']);

//Route::get('/admin', 'HomeController@gnuboard');

//admin
Route::get('/admin/{id}', 'HomeController@admin_index')
    ->where(['id' => '[0-9]+']);
Route::get('/admin/post/{id}', 'HomeController@post_project')
    ->where(['id' => '[0-9]+']);
Route::get('/admin/step_change/{id}/{change}', 'HomeController@step_change')
    ->where(['id' => '[0-9]+']);


//내 프로젝트 단계별
//검수중 프로젝트
Route::get('/client/project/checking', ['as' => 'checking_client', 'uses' => 'ProcessController@checking_client']);
//검수_임시저장
Route::get('/client/project/temp', 'ProcessController@temp_client');
//검수_등록실패
Route::get('/client/project/fail', 'ProcessController@fail_client');
//등록 프로젝트
Route::get('/client/project/posted', 'ProcessController@posted_client');
//진행 중 프로젝트
Route::get('/client/project/carryon', 'ProcessController@carry_on_client');
//진행 중 프로젝트 상세정보
Route::get('/client/project/carryon/{id}', 'ProcessController@carry_on_client_detail')
    ->where(['id' => '[0-9]+']);
//커뮤니케이션 게시판
Route::get('/client/project/carryon/communication/{p_id}',
    ['as' => 'communication', 'uses' => 'CommunicationController@communication_PC'])
    ->where(['p_id' => '[0-9]+']);
Route::get('/client/project/carryon/detail/{id}',
    ['as' => 'communication_detail', 'uses' => 'CommunicationController@communication_PC_detail'])
    ->where(['id' => '[0-9]+']);
Route::get('/client/project/carryon/{p_id}/create',
    ['as' => 'communication_create', 'uses' => 'CommunicationController@communication_PC_create']);
Route::post('/client/project/carryon/{p_id}/create',
    ['as' => 'communication_create_post', 'uses' => 'CommunicationController@communication_PC_create_post']);
Route::get('/client/project/carryon/{id}/update',
    ['as' => 'communication_update', 'uses' => 'CommunicationController@communication_PC_update']);
Route::post('/client/project/carryon/{id}/update',
    ['as' => 'communication_update_put', 'uses' => 'CommunicationController@communication_PC_update_put']);
Route::post('/client/project/carryon/{id}/delete',
    ['as' => 'communication_delete', 'uses' => 'CommunicationController@communication_PC_delete']);
//완료된 프로젝트
Route::get('/client/project/done', 'ProcessController@done_client');
//취소한 프로젝트
Route::get('/client/project/cancel', 'ProcessController@cancel_client');

//지원 프로젝트
Route::get('/partner/project/apply', 'ProcessController@apply_partner');
//관심 프로젝트
Route::get('/partner/project/interesting', 'ProcessController@interesting_partner');

//지원 종료 프로젝트
Route::get('/partner/project/apply/finished', 'ProcessController@apply_finished_partner');

//진행 중 프로젝트
Route::get('/partner/project/carryon', 'ProcessController@carry_on_partner');
Route::get('/partner/project/carryon/{id}', 'ProcessController@carry_on_partner_detail')
    ->where(['id' => '[0-9]+']);

// 지급요청
Route::post('/partner/project/carryon/pay/request/{id}', 'ProcessController@carry_on_pay_request')
    ->where(['id' => '[0-9]+']);

// 지급요청
Route::post('/client/project/carryon/pay/request/{id}', 'ProcessController@carry_on_pay_accept')
    ->where(['id' => '[0-9]+']);


//완료된 프로젝트
Route::get('/partner/project/done', 'ProcessController@done_partner');


//고객센터
//공지사항
Route::get('/customer/notification', ['as' => 'noti_list', 'uses' => 'CustomerCentreController@notification']);
Route::get('/customer/notification/{id}', ['as' => 'noti_detail', 'uses' => 'CustomerCentreController@notification_detail'])
    ->where(['id' => '[0-9]+']);

//일대일 문의
Route::get('/customer/man_to_man', 'CustomerCentreController@man_to_man');
Route::post('/customer/man_to_man', 'CustomerCentreController@man_to_man_post');
//이메일 인증
Route::get('/customer/email_confirm',
    ['as' => 'email_confirm', 'uses' => 'CustomerCentreController@email_confirm']);

//이용약관
Route::get('/agreement', ['as' => 'agreement', 'uses' => 'CustomerCentreController@agreement']);
//개인정보 취급방침
Route::get('/personal_info', ['as' => 'personal_info', 'uses' => 'CustomerCentreController@personal_info']);


//회사소개
Route::get('/company/introduction', ['as' => 'introduction', 'uses' => 'CompanyController@introduction']);
Route::get('/company/news', ['as' => 'news', 'uses' => 'CompanyController@news']);
Route::get('/company/news/{id}', ['as' => 'news_view', 'uses' => 'CompanyController@news_view'])
    ->where(['id' => '[0-9]+']);
Route::get('/company/address', ['as' => 'address', 'uses' => 'CompanyController@address']);

Route::get('/test_email', function () {
    return view('mail/p_add_verifying_mail', ['project_name' => '부동산 p2p신규오픈 업체 입니다. 마케팅 문의']);
});
Route::get('/test_email2', function () {
    return view('mail/mail', ['project_name' => 'aaa']);
});
Route::get('/test_email_comment', function () {
    return view('mail/comment_mail', ['project_name' => 'aaa']);
});