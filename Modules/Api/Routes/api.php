<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->name('api.v1.')
    ->group(function () {

        Route::middleware('api.sign')->group(function () {

            Route::post('/categories', 'CmsController@categories');
            Route::post('/category/info', 'CmsController@categoryInfo');

            Route::post('/articles', 'CmsController@articles');
            Route::post('/article/info', 'CmsController@articleInfo');

            Route::post('/store/categories', 'StoreController@categories');
            Route::post('/store/category/info', 'StoreController@categoryInfo');

            Route::post('/store/goods/list', 'StoreController@goodsList');
            Route::post('/store/goods/info', 'StoreController@goodsInfo');
        });

        Route::post('/timestamp', 'SystemController@timestamp');

    });


