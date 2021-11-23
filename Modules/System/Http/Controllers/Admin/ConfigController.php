<?php


namespace Modules\System\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\System\Http\Requests\ConfigRequest;
use Modules\System\Models\Config;
use Modules\System\Service\AddonService;

class ConfigController extends MyController
{

    /**
     * 系统配置页面
     */
    public function index()
    {
        $systemConfig = system_config();
        return $this->view('admin.config.config', compact('systemConfig'));
    }

    /**
     * 保存系统配置
     */
    public function store(ConfigRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = system_config_store($data, 'system');

        return $this->result($result);
    }
}
