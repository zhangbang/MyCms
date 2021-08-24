<?php


namespace Addons\LinkSubmit\Requests;


use App\Http\Requests\MyRequest;

class ConfigRequest extends MyRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'link_submit_url' => ['required', 'max:255'],
            'link_submit_token' => ['required', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'link_submit_url.required' => '网址不能为空',
            'link_submit_url.max' => '网址长度错误',
            'link_submit_token.required' => 'token不能为空',
            'link_submit_token.max' => 'token长度错误',
        ];
    }

}
