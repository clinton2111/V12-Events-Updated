<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', function () {
//    return redirect()->guest('login');
//});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth','prefix' => 'admin'], function () {
//    Route::post('/profile', [
//        'uses' => 'UserController@update_avatar',
//        'as' => 'user.profile'
//
//    ]);
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

});