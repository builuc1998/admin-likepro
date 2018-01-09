<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/redirect','LoginController@redirect');

Route::get('/callback','LoginController@callback');

Route::get('/logout','LoginController@logout');

Route::group(['prefix'=>'api'],function(){
   Route::get('/me','ApiController@me');
   Route::post('/installViplike','ApiController@installViplike');
   Route::get('/getViplikeID','ApiController@getViplikeID');

});




/////api agent
Route::get('/getViplikeID','AgentController@ViplikeID');