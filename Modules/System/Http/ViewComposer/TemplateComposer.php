<?php


namespace Modules\System\Http\ViewComposer;


use Illuminate\View\View;

class TemplateComposer
{
    public function compose(View $view)
    {
        $view->with([
            'page' => request()->route()->parameter('page')
        ]);
    }
}
