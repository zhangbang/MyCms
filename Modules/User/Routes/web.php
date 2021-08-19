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

        Route::get('/balance', 'BalanceController@index')->name('balance.admin');
        Route::get('/point', 'PointController@index')->name('point.admin');
    });
});
