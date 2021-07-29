<?php


namespace Modules\System\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Modules\System\Http\Requests\RoleStoreRequest;
use Modules\System\Http\Requests\RoleUpdateRequest;
use Modules\System\Models\Role;
use Modules\System\Service\RoleService;

class RoleController extends MyController
{

    /**
     * 角色列表
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $roles = Role::orderBy('id', 'desc')
                ->paginate($this->request('limit','intval'))->toArray();

            return $this->jsonSuc($roles);
        }

        return view('system::admin.role.index');
    }

    /**
     * 添加角色页面
     */
    public function create()
    {
        return view('system::admin.role.create');
    }

    /**
     * 保存角色
     */
    public function store(RoleStoreRequest $request, Role $role)
    {
        $data = $request->validated();
        $result = $role->store($data);

        return $this->result($result);
    }

    /**
     * 编辑角色页面
     */
    public function edit()
    {
        $role = Role::find($this->request('id','intval'));
        return view('system::admin.role.edit', compact('role'));
    }

    /**
     * 更新角色
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $result = $role->up($data);

        return $this->result($result);
    }

    /**
     * 删除角色
     */
    public function destroy()
    {
        $result = Role::destroy($this->request('id','intval'));
        return $this->result($result);
    }

    /**
     * 角色授权页面
     */
    public function showAuth(RoleService $roleService, Request $request)
    {

        $role = Role::find($this->request('id','intval'));

        if ($request->ajax() && $request->wantsJson()) {
            $nodes = $roleService->toTree(json_decode($role->role_node ?: '[]',true));
            return $this->jsonSuc(['data' => $nodes]);
        }

        return view('system::admin.role.auth', compact('role'));
    }

    /**
     * 角色授权
     */
    public function auth()
    {
        $result = Role::where('id', $this->request('id','intval'))
            ->update(['role_node' => json_encode(array_values($this->request('nodes')))]);

        return $this->result($result);
    }

}
