<?php


namespace Modules\System\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\System\Http\Requests\MenuStoreRequest;
use Modules\System\Http\Requests\MenuUpdateRequest;
use Modules\System\Models\Menu;
use Modules\System\Service\MenuService;

class MenuController extends MyController
{
    /**
     * 系统后台首页
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            $menus = Menu::orderBy('id', 'desc')
                ->paginate($request->input('limit'))->toArray();

            return $this->jsonSuc($menus);
        }

        return $this->view('admin.menu.index');
    }

    /**
     * 菜单添加页面
     */
    public function create(MenuService $menuService)
    {
        $menus = $menuService->menuTree();
        return $this->view('admin.menu.create', compact('menus'));
    }

    /**
     * 保存菜单
     */
    public function store(MenuStoreRequest $request, Menu $menu)
    {
        $data = $request->validated();
        $result = $menu->store($data);

        return $this->result($result);
    }

    /**
     * 编辑菜单页面
     */
    public function edit(MenuService $menuService)
    {
        $id = $this->request('id', 'intval');
        $menu = Menu::find($id);

        $menus = $menuService->menuTree();

        return $this->view('admin.menu.edit', compact('menu', 'menus'));
    }

    /**
     * 更新菜单
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $data = $request->validated();
        $result = $menu->up($data);

        return $this->result($result);
    }

    /**
     * 删除菜单
     */
    public function destroy()
    {
        $result = Menu::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }

    /**
     * 菜单配置
     */
    public function config()
    {
        $config = system_config();
        return $this->view('admin.menu.config', compact('config'));
    }

    public function storeCfg()
    {
        $data = [
            'menu_show_type' => $this->request('menu_show_type', 'intval'),
            'menu_default_open' => $this->request('menu_default_open', 'intval'),
        ];

        $result = system_config_store($data, 'system');

        return $this->result($result);
    }
}
