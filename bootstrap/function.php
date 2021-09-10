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
    function system_config($cfgKey = [], $group = 'system')
    {
        $config = system_config_cache($cfgKey, $group);

        if ($config === false) {
            $config = (new \Modules\System\Models\Config())->group($group)->getConfig(
                is_string($cfgKey) ? [$cfgKey] : $cfgKey
            );
        }

        return is_string($cfgKey) ? $config[$cfgKey] : $config;

    }
}

/*
 * 从缓存中获取系统配置
 */
if (!function_exists('system_config_cache')) {
    function system_config_cache($cfgKey, $group)
    {
        if (file_exists(base_path('bootstrap/cache/system_config.php'))) {

            $systemConfig = config('system_config')[$group] ?? [];

            if (empty($systemConfig)) {
                return is_string($cfgKey) ? '' : [];
            }

            if (is_string($cfgKey)) {
                return $systemConfig[$cfgKey];
            }

            $array = [];
            foreach ($systemConfig as $key => $item) {
                if (empty($cfgKey) || in_array($key, $cfgKey)) {
                    $array[$key] = $item;
                }
            }

            return $array;
        }

        return false;
    }
}

/*
 * 更新系统配置缓存
 */
if (!function_exists('update_system_config_cache')) {
    function update_system_config_cache()
    {

        $configs = \Modules\System\Models\Config::get();

        $formatConfig = [];

        foreach ($configs as $config) {
            $config = $config->toArray();
            $formatConfig[$config['cfg_group']][$config['cfg_key']] = $config['cfg_val'];
        }

        \Illuminate\Support\Facades\Storage::disk('root')->put(
            'bootstrap/cache/system_config.php',
            "<?php \n\rreturn " . var_export($formatConfig,true) . ";"
        );

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

/*
 * 获取图片链接
 */
if (!function_exists('system_image_url')) {
    function system_image_url($path): string
    {
        $disk = system_config('site_upload_disk');

        if ($disk == 'oss') {

            $config = system_config([], $disk);

            return $config['oss_url'] ?
                $config['oss_url'] . $path :
                "//" . $config['oss_bucket'] . "." . $config['oss_endpoint'] . "/" . $path;

        }

        return str_replace('public/', '/', $path);
    }
}
