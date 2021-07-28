<?php


namespace Modules\System\Http\Requests;


use App\Http\Requests\MyRequest;

class AdminUpdateRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required'],
            'role_id' => ['required'],
            'remark' => ['max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => '非法参数',
            'role_id.required' => '管理员角色必须选择',
            'remark.max' => '备注长度错误',
        ];
    }
}
