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


Route::get('/p_add/complete','CreateController@complete');

Route::post('/p_add/{step}', 'CreateController@postCreate');

Route::get('/p_add/{step}', 'CreateController@index');



Route::get('/p_search', 'MainController@p_search');

Route::get('/partner', 'MainController@partner');

Route::auth();

Route::get('/home', 'HomeController@index');
