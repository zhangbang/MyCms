<?php


namespace Addons\Ads\Requests;


use Addons\Ads\Models\Ads;
use App\Http\Requests\MyRequest;

class AdsRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'code' => [
                'required',
                'max:100',
                function ($attribute, $value, $fail) {
                    $where[] = ['code', '=', $value];
                    if ($id = $this->input('id')) {
                        $where[] = ['id', '!=', $id];
                    }
                    $ads = Ads::where($where)->first();
                    if ($ads) {
                        $fail('标识已存在');
                    }
                }
            ],
            'description' => ['max:255'],
            'content' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请输入名称',
            'name.max' => '名称长度错误',
            'code.required' => '请输入标识',
            'code.max' => '标识长度错误',
            'code.unique' => '标识已存在',
            'description.max' => '描述长度错误',
            'content.required' => '请填写广告内容',
        ];
    }
}
