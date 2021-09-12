<?php


namespace Addons\Seo\Controllers;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\System\Models\Config;

class SeoController extends MyController
{

    public function config()
    {
        $seoConfig = system_config([], 'seo');
        return $this->view('admin.config', compact('seoConfig'));
    }

    /**
     * 保存系统配置
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $result = system_config_store($data, 'seo');

        return $this->result($result);
    }

}
