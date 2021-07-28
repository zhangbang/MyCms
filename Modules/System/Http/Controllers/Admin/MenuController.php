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

        return view('system::admin.menu.index');
    }

    /**
     * 菜单添加页面
     */
    public function create(MenuService $menuService)
    {
        $menus = $menuService->menuTree();
        return view('system::admin.menu.create',compact('menus'));
    }


    public function store(MenuStoreRequest $request,Menu $menu)
    {
        $data = $request->validated();
        $result = $menu->store($data);

        return $this->result($result);
    }


    public function edit(MenuService $menuService)
    {
        $id = $this->request('id','intval');
        $menu = Menu::find($id);

        $menus = $menuService->menuTree();

        return view('system::admin.menu.edit', compact('menu','menus'));
    }

    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $data = $request->validated();
        $result = $menu->up($data);

        return $this->result($result);
    }

    public function destroy()
    {
        $result = Menu::destroy($this->request('id','intval'));
        return $this->result($result);
    }

}
