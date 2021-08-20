<?php


namespace Modules\Cms\Http\Requests;


use App\Http\Requests\MyRequest;

class ArticleTagRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tag_name' => ['required','max:255'],
            'description' => ['max:255'],

        ];
    }

    public function messages(): array
    {
        return [
            'tag_name.required' => '请输入标签名称',
            'tag_name.max' => '标签名称长度错误',
            'description.max' => '描述长度错误',
        ];
    }
}
