<?php


namespace Addons\Nav\Requests;


use App\Http\Requests\MyRequest;

class NavRequest extends MyRequest
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
            'url' => ['required','max:255'],
            'target' => ['required','max:255'],
            'sort' => ['integer'],
            'ico' => ['max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'pid.required' => '必须选择上级菜单',
            'name.required' => '请输入名称',
            'name.max' => '名称长度错误',
            'url.required' => '请输入URL',
            'ico.max' => 'URL长度错误',
            'url.max' => 'URL长度错误',
            'target.required' => '请选择打开方式',
            'target.max' => '打开方式长度错误',
            'sort.integer' => '请输入排序',
        ];
    }
}
