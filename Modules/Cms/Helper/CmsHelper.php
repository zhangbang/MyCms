<?php


namespace Modules\Cms\Helper;


use App\Helpers\ViewHelpers;

trait CmsHelper
{

    use ViewHelpers;

    public function theme($view = null, $data = [], $mergeData = [])
    {
        return $this->view('web.default.' . $view, $data, $mergeData);
    }

}
