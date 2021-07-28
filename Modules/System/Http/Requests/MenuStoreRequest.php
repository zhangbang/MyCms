<?php


namespace Modules\System\Http\Requests;


use App\Http\Requests\MyRequest;

class MenuStoreRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pid' => ['required', 'integer'],
            'title' => ['required', 'max:50'],
            'url' => ['max:255'],
            'icon' => ['max:50'],
            'target' => ['required'],
            'sort' => ['integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'pid.required' => '请选择上级菜单',
            'pid.integer' => '上级菜单参数错误',

            'title.required' => '请输入菜单名称',
            'title.max' => '菜单名称不能超过50个字符',

            'url.max' => '菜单链接不能超过255个字符',

            'icon.max' => '图标长度错误',
            'target.required' => '请选择菜单打开方式',

            'sort.integer' => '菜单排序参数错误',
        ];
    }
}
