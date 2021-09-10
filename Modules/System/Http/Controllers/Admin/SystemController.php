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
        $systemConfig = system_config();
        return $this->view('admin.index', compact('systemConfig'));
    }

    /**
     * 后台欢迎页
     */
    public function dashboard()
    {
        return $this->view('admin.dashboard', ['diy_js_path' => 'admin/js/system.index.js', 'diy_action' => 'dashboard']);
    }

    /**
     * 后台上传图片接口
     */
    public function images(Request $request)
    {
        if ($request->file('file')) {
            $path = $request->file('file')->store('public/uploads/' . date('Ym/d'), system_config('site_upload_disk'));
            return $this->jsonSuc(['msg' => '上传成功', 'data' => system_image_url($path)]);
        }

        if ($request->file('upload')) {
            $path = $request->file('upload')->store('public/uploads/' . date('Ym/d'), system_config('site_upload_disk'));
            return $this->jsonSuc([
                'error' => [
                    'message' => '上传成功'
                ],
                'url' => system_image_url($path),
                'uploaded' => 1,

            ]);
        }

        return $this->jsonErr(['msg' => '上传失败']);
    }

}
