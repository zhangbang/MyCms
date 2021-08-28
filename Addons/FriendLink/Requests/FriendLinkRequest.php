<?php


namespace Addons\FriendLink\Requests;


use App\Http\Requests\MyRequest;

class FriendLinkRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','max:255'],
            'url' => ['required','max:255'],
            'target' => ['required','max:255'],
            'sort' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请输入名称',
            'name.max' => '名称长度错误',
            'url.required' => '请输入URL',
            'url.max' => 'URL长度错误',
            'target.required' => '请选择打开方式',
            'target.max' => '打开方式长度错误',
            'sort.required' => '请输入排序',
        ];
    }
}
