<?php


namespace Modules\Cms\Http\Requests;


use App\Http\Requests\MyRequest;

class ArticleCommentRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'single_id' => ['required','integer'],
            'parent_id' => ['required','integer'],
            'content' => ['required', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'single_id.required' => '非法参数',
            'single_id.integer' => '非法参数',
            'parent_id.required' => '非法参数',
            'parent_id.integer' => '非法参数',
            'content.required' => '评论内容不能为空',
            'content.max' => '评论内容不能超过1000个字符',
        ];
    }
}
