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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users/list', 'ComponentsController@user_list');

Route::get('request/', [
    'uses' => 'RequDemoController@getIndex',
    'as' => 'request.index'
]);

Route::post('request/confirm', [
    'uses' => 'RequDemoController@confirm',
    'as' => 'request.confirm'
]);

Route::post('request/finish', [
    'uses' => 'RequDemoController@finish',
    'as' => 'request.finish'
]);