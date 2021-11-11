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
    'namespace' => '\Modules\Cms\Http\Controllers\Admin'
], function () {
    Route::group(['prefix' => 'article/admin'], function () {
        Route::get('/category', 'ArticleCategoryController@index')->name('article.category');
        Route::get('/category/edit', 'ArticleCategoryController@edit')->name('article.category.edit');
        Route::post('/category/edit', 'ArticleCategoryController@update');
        Route::get('/category/create', 'ArticleCategoryController@create')->name('article.category.create');
        Route::post('/category/create', 'ArticleCategoryController@store');
        Route::post('/category/destroy', 'ArticleCategoryController@destroy');


        Route::get('/', 'ArticleController@index')->name('article.admin');
        Route::get('/create', 'ArticleController@create')->name('article.admin.create');
        Route::post('/create', 'ArticleController@store');
        Route::get('/edit', 'ArticleController@edit')->name('article.admin.edit');
        Route::post('/edit', 'ArticleController@update');
        Route::post('/destroy', 'ArticleController@destroy');
        Route::get('/tags', 'ArticleController@tags')->name('article.admin.tags');
        Route::post('/tags', 'ArticleController@tagStore');


        Route::get('/tag', 'ArticleTagController@index')->name('article.tag');
        Route::get('/tag/edit', 'ArticleTagController@edit')->name('article.tag.edit');
        Route::post('/tag/edit', 'ArticleTagController@update');
        Route::get('/tag/create', 'ArticleTagController@create')->name('article.tag.create');
        Route::post('/tag/create', 'ArticleTagController@store');
        Route::post('/tag/destroy', 'ArticleTagController@destroy');

        Route::get('/comment', 'ArticleCommentController@index')->name('article.comment');
        Route::get('/comment/config', 'ArticleCommentController@config')->name('article.comment.config');
        Route::post('/comment/config', 'ArticleCommentController@storeCfg');
        Route::post('/comment/modify', 'ArticleCommentController@modify')->name('article.comment.modify');
        Route::post('/comment/destroy', 'ArticleCommentController@destroy');
    });
});

Route::group([
    'namespace' => '\Modules\Cms\Http\Controllers\Web'
], function () {
    Route::get('/cms', 'CmsController@index')->name('cms.index');
    Route::get('/category/{id}', 'CmsController@category')->name('cms.category')->where('id', '[0-9]+');
    Route::get('/category/{id}/page/{page}', 'CmsController@category')->where(['id' => '[0-9]+', 'page' => '[0-9]+']);
    Route::get('/single/{id}', 'CmsController@single')->name('cms.single')->where('id', '[0-9]+');
    Route::get('/tag/{id}', 'CmsController@tag')->name('cms.tag')->where('id', '[0-9]+');
    Route::get('/tag/{id}/page/{page}', 'CmsController@tag')->where(['id' => '[0-9]+', 'page' => '[0-9]+']);
    Route::get('/page/{page}', 'CmsController@index')->where(['page' => '[0-9]+']);
    Route::get('/search/{keyword}', 'CmsController@search')->name('cms.search');
    Route::get('/search/{keyword}/page/{page}', 'CmsController@search')->where(['page' => '[0-9]+']);

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/comment/create', 'CmsController@createComment')->name('cms.single.comment.create');
    });

});
