<?php


namespace Modules\Shop\Http\Requests;


use App\Http\Requests\MyRequest;

class CategoryRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pid' => ['required'],
            'name' => ['required','max:255'],
            'description' => ['max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'pid.required' => '必须选择上级菜单',
            'name.required' => '名称必须填写',
            'name.max' => '名称长度错误',

            'description.max' => '描述说明长度错误',
        ];
    }
}
