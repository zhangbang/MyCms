<?php


namespace Modules\Api\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    /**
     * 用户登录
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        $username = $this->request("username");
        $password = $this->request("password");

        $user = app('user')->user($username);

        if ($user && Hash::check($password, $user->password)) {
            return $this->success([
                'result' => $this->objectFilterField($user, ['password', 'remember_token'], true)
            ]);
        }

        return $this->error(['msg' => "验证失败"]);

    }

    /**
     * 会员注册
     * @return JsonResponse
     */
    public function reg(): JsonResponse
    {
        $username = $this->request("username");
        $password = $this->request("password");
        $mobile = $this->request("mobile");

        if (
            !empty($username) &&
            !empty($password) &&
            $uid = app('user')->generateUser($username, $password, $mobile)
        ) {

            return $this->success(['result' => $uid]);
        }

        return $this->error(['msg' => "注册失败"]);
    }

    /**
     * 会员信息
     * @return JsonResponse
     */
    public function info(): JsonResponse
    {
        $id = $this->request("id");
        $user = app('user')->user($id);

        return $user ? $this->success([
            'result' => $this->objectFilterField($user, ['password', 'remember_token'], true)
        ]) : $this->error(['msg' => "获取失败"]);
    }

}
