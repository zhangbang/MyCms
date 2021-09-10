<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $theme = system_config();
    if (isset($theme['site_home_theme'])) {
        switch ($theme['site_home_theme']) {
            case 'cms':
                return App::call('Modules\Cms\Http\Controllers\Web\CmsController@index', []);
                break;
        }
    }

    return view('welcome');
});
