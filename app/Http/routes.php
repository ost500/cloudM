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
Route::get('/p_add/complete','CreateController@complete');

Route::post('/p_add/{step}', 'CreateController@postCreate');

Route::get('/p_add/{step}', 'CreateController@index');


//프로젝트 검색
Route::get('/p_search', 'SearchController@p_search');

Route::get('/p_search/{id}', 'SearchController@detail');



//파트너
Route::get('/partner', 'MainController@partner');



//로그인 적용 예제
Route::auth();


