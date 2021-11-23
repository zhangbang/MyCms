<?php


namespace Modules\System\Http\ViewComposer;


use Illuminate\View\View;

class AdminComposer
{
    public function compose(View $view)
    {

        $view->with([
            'js_path' => $this->path(),
            'js_action' => $this->action(),
            'version' => config('app.version'),
        ]);
    }

    protected function path(): string
    {
        $routeName = request()->route()->getName();

        if (empty($routeName)) {
            return '';
        }

        list($module, $group) = explode('.', $routeName);

        if (file_exists(base_path("public/mycms/admin/js/{$module}.{$group}.js"))) {
            return "admin/js/{$module}.{$group}.js";
        }

        if (file_exists(base_path("public/mycms/addons/{$group}/js/{$group}.js"))) {
            return "addons/{$group}/js/{$group}.js";
        }

        return '';

    }

    protected function action(): string
    {
        $routeName = request()->route()->getName();

        $routeArr = explode(".",$routeName);

        switch (count($routeArr)) {
            case 2:
                $action = 'index';
                break;
            case 3:
                $action = $routeArr[2];
                break;
            default:
                $action = '';
                break;
        }

        return $action;
    }

}
