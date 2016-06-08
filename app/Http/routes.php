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



//프로젝트
Route::get('/p_search', 'SearchController@p_search');
//프로젝트 list
Route::get('/p_search/{SearchOption}/{page?}/{sort?}/{keyword?}', 'SearchController@get_p_list')
    ->where(['SearchOption' => '[0-9]+', 'page' => '[0-9]+', 'sort' => '[1-4]']);
//프로젝트 pagination
Route::get('/p_search/pagination/{start}/{end}','SearchController@pagination');
//프로젝트 상세화면
Route::get('/detail/{id}', 'SearchController@detail')
    ->where(['id' => '[0-9]+']);

// 댓글
Route::post('/commentadd', 'SearchController@postcomment');
// 댓글 삭제
Route::post('/commentdel', 'SearchController@delete_comment');


//파트너
Route::get('/partner', 'PartnerController@partner');
Route::get('/partner/{id}','PartnerController@detail')
    ->where(['id' => '[0-9]+']);
//파트너 list
Route::get('/partner/{page}/{option}/{option2}/{keyword?}', 'PartnerController@partner_list')
    ->where(['page' => '[0-9]+']);
//프로젝트 pagination
Route::get('/p_search/pagination/{start}/{end}','SearchController@pagination');



//이용방법
Route::get('/services', 'HowtouseController@services');

Route::get('/serviceintro', 'HowtouseController@serviceintro');
Route::get('/client-use', 'HowtouseController@client_use');
Route::get('/partner-use', 'HowtouseController@partners_use');
Route::get('/charge', 'HowtouseController@charge');
Route::get('/faq', 'HowtouseController@faq');


//로그인
Route::auth();

Route::get('/loginModal', 'MainController@loginModal');

Route::get('/notification/{id}', 'MainController@notificationShow')
    ->where(['id' => '[1-9]']);

// mypage
Route::get('/dashboard','MypageController@dashBoard');

Route::get('/applist/{id}','MypageController@applicationList')
    ->where(['id' => '[0-9]+']);
// meeting proposal
Route::post('/applist/meeting','MypageController@meetingProposal');
// meeting cancel
Route::post('/applist/meetingCancel','MypageController@meetingCancel');
// contract
Route::post('/applist/contract','MypageController@contract');

Route::get('/mypage', 'MypageController@mypage');

Route::get('/setting', 'MypageController@setting');
// delete project
Route::post('/rm_project','DeleteController@delete_project');
// delete Application
Route::post('/rm_app','DeleteController@delete_application');



// mypage post
Route::post('/mypage/img', 'MypagePostController@setProfileimg');

// application
Route::get('/apply/{pid}', 'AppController@application_post');

//Route::get('/admin', 'HomeController@gnuboard');
//
Route::get('/admin/{id}','HomeController@admin_index')
    ->where(['id' => '[0-9]+']);
Route::get('/admin/post/{id}','HomeController@post_project')
    ->where(['id' => '[0-9]+']);
Route::get('/admin/step_change/{id}/{change}','HomeController@step_change')
    ->where(['id' => '[0-9]+']);
