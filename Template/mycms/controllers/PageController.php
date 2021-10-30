<?php


namespace Template\mycms\controllers;


use App\Http\Controllers\MyController;

class PageController extends MyController
{

    public function statement()
    {
        session([
            'the_page' => 'page.statement',
            'page_title' => "插件协议 & 免责声明",
        ]);

        return $this->theme('statement');
    }

}
