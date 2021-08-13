<?php


Route::group(
    [
        'prefix' => 'addon/system_log',
        'middleware' => 'admin.auth',
        'namespace' => 'Addons\SystemLog\Controllers'
    ], function () {
    Route::get('/', 'SystemLogController@index')->name('addon.system_log.index');
    Route::get('show', 'SystemLogController@show')->name('addon.system_log.show');
});
