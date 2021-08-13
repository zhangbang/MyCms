<?php


namespace Modules\System\Http\Controllers\Admin;


use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\System\Http\Requests\AdminPwdRequest;
use Modules\System\Http\Requests\AdminStoreRequest;
use Modules\System\Http\Requests\AdminUpdateRequest;
use Modules\System\Models\Admin;
use Modules\System\Models\Role;

class AdminController extends MyController
{
    /**
     * 管理员列表页
     */
    public function index(Request $request)
    {

        if ($request->ajax() && $request->wantsJson()) {
            $admins = Admin::with(['role:id,role_name'])->orderBy('id', 'desc')
                ->paginate($this->request('limit','intval'))->toArray();

            return $this->jsonSuc($admins);
        }

        return $this->view('admin.admin.index');
    }

    /**
     * 修改管理员字段
     */
    public function modify()
    {
        $admin = Admin::find($this->request('id','intval'));
        $admin->{$this->request('field')} = $this->request('value');
        $result = $admin->save();

        return $this->result($result);
    }

    /**
     * 管理员添加页面
     */
    public function create()
    {
        $roles = Role::get();
        return $this->view('admin.admin.create',compact('roles'));
    }

    /**
     * 管理员保存操作
     */
    public function store(AdminStoreRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $result = $admin->store($data);

        return $this->result($result);
    }

    /**
     * 管理员编辑页面
     */
    public function edit()
    {
        $admin = Admin::find($this->request('id','intval'));

        $roles = Role::get();

        return $this->view('admin.admin.edit', compact('admin','roles'));
    }

    /**
     * 管理员保存操作
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $result = $admin->up($data);

        return $this->result($result);
    }

    /**
     * 管理员密码编辑页面
     */
    public function password()
    {
        $admin = Admin::find($this->request('id','intval'));
        return $this->view('admin.admin.password', compact('admin'));
    }

    /**
     * 设置管理员密码
     */
    public function setPwd(AdminPwdRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $result = $admin->up(['password' => Hash::make($data['password']), 'id' => $data['id']]);

        return $this->result($result);
    }


    /**
     * 删除管理员
     */
    public function destroy()
    {
        $result = Admin::destroy($this->request('id','intval'));
        return $this->result($result);
    }

}
