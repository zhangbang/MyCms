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
    'namespace' => '\Modules\Shop\Http\Controllers\Admin'
], function () {
    Route::group(['prefix' => 'shop/admin'],function (){
        Route::get('/category', 'CategoryController@index')->name('shop.category');
        Route::get('/category/edit', 'CategoryController@edit')->name('shop.category.edit');
        Route::post('/category/edit', 'CategoryController@update');
        Route::get('/category/create', 'CategoryController@create')->name('shop.category.create');
        Route::post('/category/create', 'CategoryController@store');
        Route::post('/category/destroy', 'CategoryController@destroy');


        Route::get('/goods', 'GoodsController@index')->name('shop.goods');
        Route::get('/goods/edit', 'GoodsController@edit')->name('shop.goods.edit');
        Route::post('/goods/edit', 'GoodsController@update');
        Route::get('/goods/create', 'GoodsController@create')->name('shop.goods.create');
        Route::post('/goods/create', 'GoodsController@store');
        Route::post('/goods/destroy', 'GoodsController@destroy');

    });
});

Route::group([
    'namespace' => '\Modules\Shop\Http\Controllers\Web'
], function () {

});
