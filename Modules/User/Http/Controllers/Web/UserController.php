<?php


namespace Modules\User\Http\Controllers\Web;


use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Requests\RegRequest;
use Modules\User\Models\User;

class UserController extends MyController
{

    public function index()
    {

        session([
            'the_page' => 'user',
            'page_title' => "会员中心",
        ]);

        return $this->theme('user');
    }

    public function reg()
    {
        session([
            'the_page' => 'user.reg',
            'page_title' => "会员注册",
        ]);

        return $this->theme('reg');
    }

    public function store(RegRequest $request, User $user)
    {
        $data = $request->validated();

        if (session('reg_code') == $data['reg_code']) {

            unset($data['reg_code']);
            $data['password'] = Hash::make($data['password']);

            $result = $user->store($data);

            return $this->result($result, ['msg' => '注册成功']);
        }

        return $this->result(false, ['msg' => "注册失败"]);
    }

    public function login()
    {
        session([
            'the_page' => 'user.login',
            'page_title' => "会员登录",
        ]);

        return $this->theme('login');
    }

    public function auth()
    {
        $name = $this->request('name');
        $password = $this->request('password');

        if (empty($name) || empty($password)) {
            return $this->result(false, ['msg' => "请正确填写账号密码"]);
        }

        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            return $this->result(true, ['msg' => "登录成功"]);
        }

        return $this->result(false, ['msg' => "验证失败，请确认账号密码后重试"]);
    }

    public function regCode()
    {

        if (session('send_time') >= time()) {
            return $this->result(false, ['msg' => "操作频繁，请稍后再试"]);
        }

        if ($mobile = $this->request('mobile', 'mobile')) {

            $number = rand(1111, 9999);
            $result = ali_sms($mobile, 0, ['number' => $number]);

            if ($result) {

                session(['reg_code' => $number]);
                session(['send_time' => time() + 60]);
            }

            return $this->result($result);

        }

        return $this->result(false, ['msg' => "发送识别，请检查手机号码是否正确"]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->intended();
    }

}
