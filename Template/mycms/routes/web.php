<?php

Route::group([
    'namespace' => '\Template\mycms\controllers'
], function () {

    Route::get('/statement', 'PageController@statement')->name('page.statement');

});

?>
