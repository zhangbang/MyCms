<?php


namespace Addons\Nav\Controllers;


use Addons\Nav\Models\Nav;
use Addons\Nav\Requests\NavRequest;
use Addons\Nav\Service\NavService;
use App\Http\Controllers\MyController;
use Illuminate\Http\Request;

class NavController extends MyController
{

    public function index()
    {
        is_home(system_config());

        return is_mobile() ? $this->view('web.mobile') : $this->view('web.index');
    }

    public function show(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $where = [];
            if ($json = $request->input('filter')) {
                $filters = json_decode($json, true);
                foreach ($filters as $name => $filter) {
                    if ($name == 'name') {
                        $where[] = [$name, 'like', "%{$filter}%"];
                    }
                    if ($name == 'parent.name') {
                        $parent = Nav::where('name',$filter)->first();
                        if ($parent) {
                            $where[] = ['pid', '=', $parent->id];
                        }
                    }
                }
            }

            $nav = Nav::with('parent')->orderBy('id', 'desc')
                ->where($where)
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($nav);
        }

        return $this->view('admin.index');
    }

    public function create(NavService $service)
    {
        $navs = $service->categoryTree();
        return $this->view('admin.create', compact('navs'));
    }

    public function store(NavRequest $request, Nav $nav)
    {
        $data = $request->validated();
        $result = $nav->store($data);

        return $this->result($result);
    }

    public function edit(NavService $service)
    {
        $navs = $service->categoryTree();

        $id = $this->request('id', 'intval');
        $nav = Nav::find($id);

        return $this->view('admin.edit', compact('navs', 'nav'));
    }

    public function update(NavRequest $request, Nav $nav)
    {
        if ($id = $this->request('id', 'intval')) {
            $data = $request->validated();
            $data['id'] = $id;

            $result = $nav->up($data);

            return $this->result($result);
        }

        return $this->result(false);
    }

    public function destroy()
    {
        $result = Nav::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }

    public function config()
    {
        $config = system_config([]);
        return $this->view('admin.config', compact('config'));
    }

    public function cfgStore()
    {
        $theme = $this->request('site_home_theme');
        $result = system_config_store(['site_home_theme' => $theme], 'system');

        return $this->result($result);
    }
}
