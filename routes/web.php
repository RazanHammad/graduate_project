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
/*Route::get('/control', function () {
    return view('Dash.dash');
});*/
Route::get('/', function () {
    return view('Dash.home');
});

Route::get('/download','downloadController@index');
Route::get('/decompress','downloadController@create');
Route::get('/show','downloadController@store');
//Route::get('/split','downloadControllerv1@show1');
Route::get('/test','TestController@index');
//Route::get('/mqtt','mqttController@SendMsgViaMqtt');

Route::get('/http','httpclientControllerv4@httpclient');
Route::get('/split','splitControllerv5@split');
Route::get('/xss_split','xssController@split');
Route::get('/xss_http','xssController@http');

Route::get('sqli_split','sqliControllerv1@split');
Route::get('/sqli_http','sqliControllerv1@http');
Route::get('/guzzle','guzzleController@guzzle');
//Route::get('/low','lowController@http');
Route::get('/error','errorController@index');
//Route::resource('/rules','rulesController');

Route::resource('sqli','sqliControllerv2');
Route::resource('xss','xssControllerv2');
Route::resource('webRoles','webRolesController');


