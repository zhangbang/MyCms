<?php


namespace Modules\System\Http\Requests;


use App\Http\Requests\MyRequest;

class AdminStoreRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:my_system_admin', 'max:30'],
            'password' => ['required', 'max:16', 'min:6'],
            'role_id' => ['required'],
            'remark' => ['max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '管理员名称不能为空',
            'name.unique' => '管理员名称已存在',
            'name.max' => '管理员名称长度错误',

            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过16个字符',
            'password.min' => '密码长度不能小于6个字符',

            'role_id.required' => '管理员角色必须选择',

            'remark.max' => '备注长度错误',
        ];
    }
}
