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

    public function config()
    {
        $systemConfig = system_config([], $this->lowerName);
        return $this->view('admin.config', compact('systemConfig'));
    }

    /**
     * 保存系统配置
     */
    public function store(ConfigRequest $request)
    {
        $data = $request->validated();

        $result = system_config_store($data, $this->lowerName);

        return $this->result($result);
    }

    public function create()
    {
        return $this->view('admin.create');
    }

    public function push()
    {
        $urls = $this->request('urls');
        link_submit($urls);

        return $this->result(true);
    }

}
