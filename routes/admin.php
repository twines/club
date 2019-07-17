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

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@doLogin');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/index', 'IndexController@index');
        Route::get('/up', 'UpController@index');
        Route::get('/video', 'VideoController@index');
        Route::get('/topic', 'TopicController@index');
    });
});
