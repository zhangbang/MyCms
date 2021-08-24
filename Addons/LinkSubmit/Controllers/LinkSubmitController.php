<?php


namespace Addons\LinkSubmit\Controllers;


use Addons\LinkSubmit\Models\LinkSubmit;
use Addons\LinkSubmit\Requests\ConfigRequest;
use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\System\Models\Config;

class LinkSubmitController extends MyController
{

    private $lowerName = 'link_submit';

    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $admins = LinkSubmit::orderBy('id', 'desc')
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($admins);
        }

        return $this->view('admin.index');
    }

    public function config(Config $config)
    {
        $systemConfig = $config->group($this->lowerName)->getConfig();
        return $this->view('admin.config', compact('systemConfig'));
    }

    /**
     * 保存系统配置
     */
    public function store(ConfigRequest $request, Config $config)
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
                'cfg_group' => $this->lowerName,
            ]);
        }

        $result = $config->batchUpdate([
            'cfg_val' => ['cfg_key' => $data]
        ], "cfg_group = '{$this->lowerName}'");

        return $this->result($result);
    }

}
