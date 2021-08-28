<?php
/*
 * 将数组拼接成字符串
 */
if (!function_exists('join_data')) {
    function join_data($array, $separator = ''): string
    {
        $collect = array_map(function ($item) {
            return "'{$item}'";
        }, $array);

        return join($separator, $collect);
    }
}

/*
 * 插件地址
 */
if (!function_exists('addon_path')) {
    function addon_path($name, $path = ''): string
    {
        return base_path('Addons/' . $name . $path);
    }
}

/*
 * 获取系统配置
 */
if (!function_exists('system_config')) {
    function system_config($cfgKey)
    {

        $config = (new \Modules\System\Models\Config())->getConfig(
            is_string($cfgKey) ? [$cfgKey] : $cfgKey
        );

        return is_string($cfgKey) ? $config[$cfgKey] : $config;

    }
}

/*
 * 获取当前域名
 */
if (!function_exists('system_http_domain')) {
    function system_http_domain(): string
    {
        return (env('IS_HTTPS') ? 'https://' : 'http://') . request()->server('HTTP_HOST');
    }
}
