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
        'prefix' => 'addon/sitemap',
        'namespace' => 'Addons\SiteMap\Controllers'
    ], function () {

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/', 'SiteMapController@index')->name('addon.site_map.index');
        Route::post('/', 'SiteMapController@make');
    });

    Route::get('make', 'SiteMapController@make')->name('addon.site_map.make');
});
