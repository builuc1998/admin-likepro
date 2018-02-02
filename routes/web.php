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

Route::get('/home', 'HomeController@index');

Route::get('/redirect','LoginController@redirect');

Route::get('/callback','LoginController@callback');

Route::get('/logout','LoginController@logout');

Route::group(['prefix'=>'api'],function(){
   Route::get('/me','ApiController@me');
   Route::post('/install','ApiController@install');
   Route::get('/getViplikeID','ApiController@getViplikeID');
   Route::get('/updateClone','agentApiController@updateClone');
   Route::get('/DoVipLike','agentApiController@DoVipLike');
   
   Route::get('/DoVipLike2/{type}','agentApiController@DoVipLike');
   
   Route::get('/DoResult','agentApiController@DoResult');
   Route::get('/history','ApiController@history');
   
   Route::get('/deleteClone','CloneController@deleteClone');
   
   Route::get('/viewtask','ApiController@viewtask');
   
   Route::get('/alluser','ApiController@alluser');
   
   Route::get('/searchuser','ApiController@searchuser');
   
   Route::get('/infouser','ApiController@infouser');
   
   Route::post('/addmoney','ApiController@addmoney');
   
   Route::get('/transaction','ApiController@transaction');
   
   Route::post('/ConfirmTransaction','ApiController@ConfirmTransaction');
   
   // Route::get('/history','agentApiController@history');
});

/////////api clone
Route::get('/deletePhone','CloneController@deletePhone');
Route::get('/upOne','CloneController@upOne');
Route::get('/updateClone','CloneController@updateClone');
Route::get('/getCloneByStatus','CloneController@getCloneByStatus');
Route::get('/getCloneByUID','CloneController@getCloneByUID');
Route::get('/getClone','CloneController@getClone');
Route::get('/DoTakeCare','CloneController@doTakeCare');
Route::post('/chucvu','CloneController@chucvu');