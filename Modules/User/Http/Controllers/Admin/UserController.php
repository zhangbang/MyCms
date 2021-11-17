<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\MyController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\UserPwdRequest;
use Modules\User\Http\Requests\UserStoreRequest;
use Modules\User\Http\Requests\UserUpdateRequest;
use Modules\User\Models\User;
use Modules\User\Service\UserService;

class UserController extends MyController
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {

            $where = [];
            if ($json = $request->input('filter')) {
                $filters = json_decode($json, true);
                foreach ($filters as $name => $filter) {
                    $where[] = [$name,  '=', $filter];
                }
            }

            $admins = User::orderBy('id', 'desc')
                ->where($where)
                ->paginate($this->request('limit', 'intval'))->toArray();

            return $this->jsonSuc($admins);
        }
        return $this->view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param UserStoreRequest $request
     */
    public function store(UserStoreRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $result = $user->store($data);

        return $this->result($result);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::find($this->request('id', 'intval'));
        return $this->view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $result = $user->up($data);

        return $this->result($result);
    }

    /**
     * 密码编辑页面
     */
    public function password()
    {
        $user = User::find($this->request('id', 'intval'));
        return $this->view('admin.user.password', compact('user'));
    }

    /**
     * 设置密码
     */
    public function setPwd(UserPwdRequest $request, User $user)
    {
        $data = $request->validated();
        $result = $user->up(['password' => Hash::make($data['password']), 'id' => $data['id']]);

        return $this->result($result);
    }

    /**
     * 修改字段
     */
    public function modify()
    {
        $user = User::find($this->request('id', 'intval'));
        $user->{$this->request('field')} = $this->request('value');
        $result = $user->save();

        return $this->result($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $result = User::destroy($this->request('id', 'intval'));
        return $this->result($result);
    }

    /**
     * 变动资金页面
     */
    public function account()
    {
        $user = User::find($this->request('id', 'intval'));
        return $this->view('admin.user.account', compact('user'));
    }

    /**
     * 变动资金
     */
    public function setAccount()
    {

        $balanceRes = $pointRes = true;
        $id = $this->request('id', 'intval');

        if ($balance = $this->request('balance', 'floatval')) {
            $balanceRes = app('user')->balance($balance, $id);
        }

        if ($point = $this->request('point', 'floatval')) {
            $pointRes = app('user')->point($point, $id);
        }

        return $this->result($balanceRes && $pointRes);
    }
}
