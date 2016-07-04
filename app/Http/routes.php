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

Route::get('/', 'MainController@index');

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
Route::get('/project/{SearchOption}/{page?}/{sort?}/{keyword?}', 'SearchController@get_p_list')
    ->where(['SearchOption' => '[0-9]+', 'page' => '[0-9]+', 'sort' => '[1-4]']);
//프로젝트 pagination
Route::get('/project/pagination/{start}/{end}', 'SearchController@pagination');
//프로젝트 상세화면
Route::get('/detail/{id}', 'SearchController@detail')
    ->where(['id' => '[0-9]+']);
//관심 프로젝트
Route::post('/detail/{id}/interesting','SearchController@interesting')
    ->where(['id' => '[0-9]+']);


// 댓글
Route::post('/commentadd', 'SearchController@postcomment');
// 댓글 삭제
Route::post('/commentdel', 'SearchController@delete_comment');


//파트너
Route::get('/partner', 'PartnerController@partner');
Route::get('/partner/{id}', 'PartnerController@detail')
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

Route::get('/loginModal', 'MainController@loginModal');

Route::get('/notification', 'MainController@notificationShow');

// mypage
Route::get('/dashboard', 'MypageController@dashBoard');

Route::get('/applist/{id}', 'MypageController@applicationList')
    ->where(['id' => '[0-9]+']);
// meeting proposal
Route::post('/applist/meeting', 'MypageController@meetingProposal');
// meeting cancel
Route::post('/applist/meetingCancel', 'MypageController@meetingCancel');
// contract
Route::post('/applist/contract', 'MypageController@contract');


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
Route::post('/mypage/auth_img', 'MypagePostController@setProfileAuthimg');

// User info
Route::post('/mypage/info', 'MypagePostController@set_profile_info');

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
Route::get('/mypage', 'MypageController@mypage');
//프로필 edit intro
Route::get('/mypage/intro_edit', 'MypageController@mypage_intro_edit');
Route::post('/mypage/intro_edit', 'MypageController@mypage_intro_edit_post');
//프로필 edit skill
Route::post('/mypage/skill_edit', 'MypageController@mypage_skill_edit_post');
Route::post('/mypage/skill_delete', 'MypageController@mypage_skill_del_post');
//프로필 skill list
Route::get("/mypage/skill_list", 'MypageController@skills_list');

//프로필 포트폴리오 create
Route::get("/portfolio/create", 'MypageController@portfolio_create');
Route::post("/portfolio/create", 'MypageController@portfolio_create_post');
//프로필 포트폴리오 자세히 list
Route::get("/portfolio_list/{id}", 'MypageController@portfolio')
    ->where(['id' => '[1-9]+']);
//프로필 포트폴리오 detail
Route::get("/portfolio/{id}", 'MypageController@portfolio_detail')
    ->where(['id' => '[1-9]+']);
Route::post("/portfolio/delete/{id}", 'MypageController@portfolio_delete')
    ->where(['id' => '[1-9]+']);
Route::get("/portfolio/update/{id}",'MypageController@portfolio_update')
    ->where(['id' => '[1-9]+']);
Route::post("/portfolio/update/{id}",'MypageController@portfolio_update_post')
    ->where(['id' => '[1-9]+']);



// application
Route::get('/apply/{id}/application', 'AppController@application_form')
    ->where(['id' => '[0-9]+']);

Route::post('/apply/attach_update', 'AppController@application_attach_update_post');

Route::post('/apply/{pid}', 'AppController@application_post')
    ->where(['pid' => '[0-9]+']);

Route::get('/apply/application_attach/{id}', 'AppController@application_attach_download')
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
Route::get('/client/project/checking', 'ProcessController@checking_client');
//검수_임시저장
Route::get('/client/project/temp', 'ProcessController@temp_client');
//검수_등록실패
Route::get('/client/project/fail', 'ProcessController@fail_client');
//등록 프로젝트
Route::get('/client/project/posted', 'ProcessController@posted_client');
//진행 중 프로젝트
Route::get('/client/project/carryon', 'ProcessController@carry_on_client');
//완료된 프로젝트
Route::get('/client/project/done', 'ProcessController@done_client');
//취소한 프로젝트
Route::get('/client/project/cancel', 'ProcessController@cancel_client');

//지원 프로젝트
Route::get('/partner/project/apply', 'ProcessController@apply_partner');
//관심 프로젝트
Route::get('/partner/project/interesting','ProcessController@interesting_partner');

//지원 종료 프로젝트
Route::get('/partner/project/apply/finished', 'ProcessController@apply_finished_partner');

//진행 중 프로젝트
Route::get('/partner/project/carryon', 'ProcessController@carry_on_partner');

//완료된 프로젝트
Route::get('/partner/project/done', 'ProcessController@done_partner');


//고객센터
Route::get('/customer_centre/notification','CustomerCentreController@notification');
Route::get('/customer_centre/notification/{id}','CustomerCentreController@notification_detail')
    ->where(['id' => '[0-9]+']);
