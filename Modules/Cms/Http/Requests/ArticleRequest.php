<?php


namespace Modules\Cms\Http\Requests;


use App\Http\Requests\MyRequest;

class ArticleRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required'],
            'title' => ['required','max:255'],
            'content' => ['required'],
            'description' => ['max:255'],
            'img' => ['max:255'],
            'author' => ['max:255'],
            'view' => ['integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => '请选择分类',
            'title.required' => '标题必须填写',
            'title.max' => '标题长度错误',
            'description.max' => '描述长度错误',
            'author.max' => '作者格式错误',
            'img.max' => '缩略图链接长度错误',
            'view.integer' => '请输入正确的浏览数',
            'content.required' => '请输入内容',
        ];
    }
}
