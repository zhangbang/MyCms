<?php

namespace Modules\System\Http\Controllers\Admin;

use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\System\Models\Config;
use Modules\System\Service\MenuService;

class SystemController extends MyController
{
    /**
     * 系统后台首页
     */
    public function index(Request $request, MenuService $menuService, Config $config)
    {
        if ($request->ajax() && $request->wantsJson()) {
            return $this->jsonSuc(['data' => [
                'homeInfo' => [
                    'title' => '后台首页',
                    'icon' => 'fa fa-home',
                    'href' => '/system/dashboard',
                ],
                'menuInfo' => $menuService->leftMenu()
            ]]);
        }
        $systemConfig = $config->getConfig(['site_logo']);
        return view('system::admin.index', compact('systemConfig'));
    }

    public function dashboard()
    {
        return view('system::admin.dashboard', ['diy_js_path' => 'admin/js/system.index.js', 'diy_action' => 'dashboard']);
    }

    public function images(Request $request)
    {
        if ($request->file('file')->isValid()) {
            $path = $request->file('file')->store('public/uploads/' . date('Ym/d'), 'root');
            return $this->jsonSuc(['msg' => '上传成功', 'data' => str_replace('public/', '/', $path)]);
        }

        return $this->jsonErr(['msg' => '上传失败']);
    }

}
