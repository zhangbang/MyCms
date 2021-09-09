<?php


namespace Modules\System\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Modules\System\Http\Requests\ConfigRequest;
use Modules\System\Models\Config;
use Modules\System\Service\AddonService;

class ConfigController extends MyController
{

    /**
     * 系统配置页面
     */
    public function index(Config $config)
    {
        $systemConfig = $config->getConfig();
        return $this->view('admin.config.config', compact('systemConfig'));
    }

    /**
     * 保存系统配置
     */
    public function store(ConfigRequest $request, Config $config, AddonService $service): JsonResponse
    {
        $data = $request->validated();

        $cfg = Config::whereIn('cfg_key', array_keys($data))
            ->get()->toArray();

        $newConfigs = array_diff(
            array_keys($data),
            array_column($cfg, 'cfg_key')
        );

        foreach ($newConfigs as $cfg) {
            (new Config())->store([
                'cfg_key' => $cfg,
                'cfg_val' => $data[$cfg],
                'cfg_group' => 'system',
            ]);
        }

        $result = $config->batchUpdate([
            'cfg_val' => ['cfg_key' => $data]
        ], "cfg_group = 'system'");

        if ($result !== false) {

            $service->makeCache();

            foreach ($service->all() as $item) {
                Artisan::call(
                    'vendor:publish --tag=addon_' . strtolower(Str::snake($item['ident']))
                );
            }

        }

        return $this->result($result);
    }
}
