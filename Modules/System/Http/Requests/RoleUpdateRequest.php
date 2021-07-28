<?php


namespace Modules\System\Http\Requests;


use App\Http\Requests\MyRequest;

class RoleUpdateRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required'],
            'role_name' => ['required', 'max:50'],
            'role_desc' => ['max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => '非法参数',

            'role_name.required' => '角色名称不能为空',
            'role_name.max' => '角色名称长度错误',

            'role_desc.max' => '角色说明长度错误',
        ];
    }
}
