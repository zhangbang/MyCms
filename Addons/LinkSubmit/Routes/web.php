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

Route::group(
    [
        'prefix' => 'addon/link_submit',
        'middleware' => 'admin.auth',
        'namespace' => 'Addons\LinkSubmit\Controllers'
    ], function () {
    Route::get('/', 'LinkSubmitController@index')->name('addon.link_submit.index');
    Route::get('config', 'LinkSubmitController@config')->name('addon.link_submit.config');
    Route::post('config', 'LinkSubmitController@store');
    Route::get('create', 'LinkSubmitController@create')->name('addon.link_submit.create');
    Route::post('create', 'LinkSubmitController@push');
});
