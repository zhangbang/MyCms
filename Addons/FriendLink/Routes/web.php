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
        'prefix' => 'addon/friend_link',
        'middleware' => 'admin.auth',
        'namespace' => 'Addons\FriendLink\Controllers'
    ], function () {
    Route::get('/', 'FriendLinkController@index')->name('addon.friend_link.index');
    Route::get('/edit', 'FriendLinkController@edit')->name('addon.friend_link.edit');
    Route::post('/edit', 'FriendLinkController@update');
    Route::get('/create', 'FriendLinkController@create')->name('addon.friend_link.create');
    Route::post('/create', 'FriendLinkController@store');
    Route::post('/destroy', 'FriendLinkController@destroy');
});
