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

Route::group([

    'middleware' => 'admin.auth',
    'namespace' => '\Modules\User\Http\Controllers\Admin'
], function () {

    Route::group(['prefix' => 'user/admin'],function (){
        Route::get('/', 'UserController@index')->name('user.admin');
        Route::get('/create', 'UserController@create')->name('user.admin.create');
        Route::post('/create', 'UserController@store');

        Route::get('/edit', 'UserController@edit')->name('user.admin.edit');
        Route::post('/edit', 'UserController@update');

        Route::get('/password', 'UserController@password')->name('user.admin.password');
        Route::post('/password', 'UserController@setPwd');

        Route::post('/modify', 'UserController@modify');
        Route::post('/destroy', 'UserController@destroy');

        Route::get('/account', 'UserController@account')->name('user.admin.account');
        Route::post('/account', 'UserController@setAccount');

        Route::get('/balance', 'BalanceController@index')->name('user.admin.balance');
        Route::get('/point', 'PointController@index')->name('user.admin.point');
    });
});

Route::group([
    'namespace' => '\Modules\User\Http\Controllers\Web'
], function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/user', 'UserController@index')->name('user.index');
        Route::get('/user/logout', 'UserController@logout')->name('user.logout');
    });

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/user/reg', 'UserController@reg')->name('user.reg');
        Route::post('/user/reg', 'UserController@store');
        Route::get('/user/login', 'UserController@login')->name('user.login');
        Route::post('/user/login', 'UserController@auth');
        Route::get('/user/forget', 'UserController@forget')->name('user.forget');
        Route::post('/user/reg/code', 'UserController@regCode')->name('user.reg.code');
    });



});
