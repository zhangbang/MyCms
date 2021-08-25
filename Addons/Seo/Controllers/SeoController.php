<?php


namespace Addons\Seo\Controllers;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\System\Models\Config;

class SeoController extends MyController
{

    public function config(Config $config)
    {
        $seoConfig = $config->group('seo')->getConfig();
        return $this->view('admin.config', compact('seoConfig'));
    }

    /**
     * 保存系统配置
     */
    public function store(Request $request, Config $config)
    {
        $data = $request->all();

        $cfg = Config::whereIn('cfg_key', array_keys($data))
            ->get()->toArray();

        $newConfigs = array_diff(
            array_keys($data),
            array_column($cfg, 'cfg_key')
        );

        foreach ($newConfigs as $cfg) {
            (new Config())->store([
                'cfg_key' => $cfg,
                'cfg_val' => $data[$cfg] ?? '',
                'cfg_group' => 'seo',
            ]);
        }

        $result = $config->batchUpdate([
            'cfg_val' => ['cfg_key' => $data]
        ], "cfg_group = 'seo'");

        return $this->result($result);
    }

}
