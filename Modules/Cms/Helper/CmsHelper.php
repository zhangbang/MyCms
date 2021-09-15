<?php


namespace Modules\Cms\Helper;


use App\Helpers\ViewHelpers;

trait CmsHelper
{

    use ViewHelpers;

    public function theme($view = null, $data = [], $mergeData = [])
    {
        $theme = system_config('cms_theme') ?? 'default';
        return $this->view("web.{$theme}." . $view, $data, $mergeData);
    }

}
