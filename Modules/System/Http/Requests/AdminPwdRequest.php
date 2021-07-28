<?php


namespace Modules\System\Http\Requests;


use App\Http\Requests\MyRequest;

class AdminPwdRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required'],
            'password' => ['required', 'max:16', 'min:6', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => '非法参数',

            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过16个字符',
            'password.min' => '密码长度不能小于6个字符',
            'password.confirmed' => '两次密码不一致',
        ];
    }
}
