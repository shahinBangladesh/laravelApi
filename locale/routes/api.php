<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user','ApiController@user');
Route::post('device','ApiController@devices');
Route::post('ccAddress','ApiController@ccAddress');
Route::get('ccAddress','ApiController@getCcAddress');
Route::post('news','ApiController@news');
Route::post('offer','ApiController@offer');
Route::get('offer','ApiController@getOffer');
Route::get('news','ApiController@getNews');
Route::get('topCardNews','ApiController@topCardNews');
Route::get('newsSeries','ApiController@newsSeries');
Route::get('newsUserSegment','ApiController@newsUserSegment');
Route::get('userListWithLastDevicesRow','ApiController@userListWithLastDevicesRow');