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

Route::get('/admin', function () {
    return redirect()->guest('login');
});
//Auth::routes();
Route::get('/register', [
    'uses' => 'Admin\ViewController@fetchRegisterPage',
    'as' => 'register.view'
]);
Route::post('/register', [
    'uses' => 'Auth\RegistrationController@registerUser',
    'as' => 'register.user'
]);
Route::get('/login', [
    'uses' => 'Admin\ViewController@fetchLoginPage',
    'as' => 'login.view'
]);
Route::post('/login', [
    'uses' => 'Auth\LoginController@loginUser',
    'as' => 'login.user'
]);

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web', 'checkLogin'], 'prefix' => 'admin'], function () {
    $adminControllerPrefix = "Admin\\";

    Route::post('/logout', [
        'uses' => 'Auth\LoginController@logoutUser',
        'as' => 'logout.user'
    ]);

//    View Routes
    Route::get('/dashboard', [
        'uses' => $adminControllerPrefix . 'ViewController@fetchDashboardPage',
        'as' => 'dashboard.home'
    ]);

    Route::get('/account', [
        'uses' => $adminControllerPrefix . 'ViewController@fetchAccountSettingsPage',
        'as' => 'dashboard.accountSettingsView'
    ]);

    Route::get('/contact', [
        'uses' => $adminControllerPrefix . 'ViewController@fetchContactSettingsPage',
        'as' => 'dashboard.contactSettingsView'
    ]);


    Route::post('/update-avatar', [
        'uses' => $adminControllerPrefix . 'UserController@updateAvatar',
        'as' => 'user.update_avatar'
    ]);

    Route::post('/update-password', [
        'uses' => $adminControllerPrefix . 'UserController@updatePassword',
        'as' => 'user.update_password'
    ]);

    Route::post('/update-address', [
        'uses' => $adminControllerPrefix . 'ConfigController@updateAddress',
        'as' => 'config.update_address'
    ]);
    Route::post('/update-address-map', [
        'uses' => $adminControllerPrefix . 'ConfigController@updateAddressMap',
        'as' => 'config.update_address_map'
    ]);
    Route::post('/update-address-map-style', [
        'uses' => $adminControllerPrefix . 'ConfigController@updateAddressMapStyle',
        'as' => 'config.update_address_map_style'
    ]);

});