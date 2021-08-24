<?php


namespace Modules\System\Http\Requests;


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
            'site_name' => ['required', 'max:255'],
            'site_url' => ['required', 'max:255'],
            'site_icp' => ['max:255'],
            'site_copyright' => ['max:255'],
            'site_logo' => ['max:255'],
            'site_home_theme' => ['max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'site_name.required' => '站点名称不能为空',
            'site_name.max' => '站点名称长度错误',

            'site_url.required' => '站点网址不能为空',
            'site_url.max' => '站点网址长度错误',

            'site_logo.max' => '站点Logo长度错误',

            'site_icp.max' => '站点网址长度错误',
            'site_copyright.max' => '站点网址长度错误',
            'site_home_theme.max' => '首页模板设置错误',
        ];
    }

}
