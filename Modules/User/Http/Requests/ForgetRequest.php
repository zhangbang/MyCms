<?php


namespace Modules\User\Http\Requests;


use App\Http\Requests\MyRequest;

class ForgetRequest extends MyRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'max:16', 'min:6'],
            'mobile' => ['required', 'size:11'],
            'reg_code' => ['required', 'size:4'],
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过16个字符',
            'password.min' => '密码长度不能小于6个字符',
            'mobile.required' => '手机号码不能为空',
            'mobile.size' => '手机号码格式不正确',
            'reg_code.required' => '验证码不能为空',
            'reg_code.size' => '验证码格式不正确',
        ];
    }
}
