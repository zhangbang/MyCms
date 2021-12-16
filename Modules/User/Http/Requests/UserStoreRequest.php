<?php


namespace Modules\User\Http\Requests;


use App\Http\Requests\MyRequest;

class UserStoreRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:my_user', 'max:50'],
            'nickname' => ['max:50'],
            'mobile' => ['required', 'unique:my_user', 'size:11'],
            'password' => ['required', 'max:16', 'min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '用户名不能为空',
            'name.unique' => '用户名已存在',
            'name.max' => '用户名长度错误',

            'nickname.max' => '用户昵称过长',

            'mobile.required' => '手机号码不能为空',
            'mobile.unique' => '手机号码已存在',
            'mobile.size' => '手机号码格式错误',

            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过16个字符',
            'password.min' => '密码长度不能小于6个字符',

        ];
    }
}
