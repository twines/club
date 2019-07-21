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

Route::group(['namespace' => 'Web', 'middleware' => ['webMiddleware']], function () {
    Route::get('/{id?}', 'IndexController@index');
    Route::get('/{id}.html', 'IndexController@index');
    Route::get('/player/{av}/{p?}.html', 'PlayerController@index');
    Route::post('/player/changeCategory', 'PlayerController@changeCategory');
    //视频播放时长
    Route::post('/player/time/{topicId}', 'PlayerController@addPlayTime');
});
