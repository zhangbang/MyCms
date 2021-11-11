<?php

use Modules\Shop\Models\PayLog;

/**
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

/**
 * 插件地址
 */
if (!function_exists('addon_path')) {
    function addon_path($name, $path = ''): string
    {
        return base_path('Addons/' . $name . $path);
    }
}

/**
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

        return is_string($cfgKey) && is_array($config) ?
            ($config[$cfgKey] ?? false) :
            $config;

    }
}

/**
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
                return $systemConfig[$cfgKey] ?? '';
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

/**
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
            "<?php \n\rreturn " . var_export($formatConfig, true) . ";"
        );

    }
}


/**
 * 保持系统配置
 */
if (!function_exists('system_config_store')) {
    function system_config_store($data, $group)
    {
        $cfg = Modules\System\Models\Config::whereIn('cfg_key', array_keys($data))
            ->get()->toArray();

        $newConfigs = array_diff(
            array_keys($data),
            array_column($cfg, 'cfg_key')
        );

        foreach ($newConfigs as $cfg) {
            if ($data[$cfg]) {
                (new Modules\System\Models\Config())->store([
                    'cfg_key' => $cfg,
                    'cfg_val' => $data[$cfg],
                    'cfg_group' => $group,
                ]);
            }
        }

        $result = (new Modules\System\Models\Config())->batchUpdate([
            'cfg_val' => ['cfg_key' => $data]
        ], "cfg_group = '{$group}'");

        update_system_config_cache();

        return $result;
    }
}


/**
 * 获取当前域名
 */
if (!function_exists('system_http_domain')) {
    function system_http_domain(): string
    {
        return (env('IS_HTTPS') ? 'https://' : 'http://') . request()->server('HTTP_HOST');
    }
}

/**
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

/**
 * 获取资源链接
 */
if (!function_exists('system_resource_url')) {
    function system_resource_url($path): string
    {
        return system_image_url($path);
    }
}

/**
 * 调用插件函数
 */
if (!function_exists('call_hook_function')) {
    function call_hook_function($name, ...$arg)
    {
        if (function_exists($name)) {
            return call_user_func($name, ...$arg);
        }
        return false;
    }
}

/**
 * 统计模型记录数
 */
if (!function_exists('system_model_count')) {
    function system_model_count(\App\Models\MyModel $model, $where = [])
    {
        return $model::where($where)->count();
    }
}

/**
 * 统计模型模型某个字段的总数
 */
if (!function_exists('system_model_sum')) {
    function system_model_sum(\App\Models\MyModel $model, $fields, $where = [])
    {
        if (is_string($fields)) {
            return $model::where($where)->sum($fields);
        }

        if (is_array($fields)) {
            $raws = array_map(function ($item) {
                return "SUM({$item}) as {$item}_sum";
            }, $fields);
            return $model::select(\Illuminate\Support\Facades\DB::raw(join(",", $raws)))->where($where)->first();
        }
    }
}

/**
 * 判断是否为手机端
 */
if (!function_exists("is_mobile")) {
    function is_mobile(): bool
    {

        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }

        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $client = [
                'mobile', 'nokia', 'sony', 'ericsson', 'mot', 'samsung',
                'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic',
                'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu',
                'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm',
                'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap'
            ];

            if (preg_match("/(" . implode('|', $client) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }

        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== FALSE) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === FALSE || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }

        return false;
    }
}

/**
 * 参数过滤
 */
if (!function_exists('paramFilter')) {
    function paramFilter($value)
    {
        if (preg_match("/['\\\"]+/", $value)) {
            return null;
        }
        $value = str_replace("&#x", "& # x", $value);    //过滤一些不安全字符
        $value = preg_replace("/eval/i", "eva l", $value);    //过滤不安全函数
        !get_magic_quotes_gpc() && $value = addslashes($value);
        return $value;
    }
}

/**
 * 获取客户端真实IP
 */
if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
            return explode(",", $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }

        return request()->getClientIp();
    }
}

/**
 * 获取图片文件格式
 */
if (!function_exists('get_img_suffix')) {
    function get_img_suffix($name)
    {
        $info = getimagesize($name);

        $suffix = false;

        if ($mime = $info['mime']) {
            $suffix = explode('/', $mime)[1];
        }

        return $suffix;
    }
}

/**
 * 获取资源的http地址
 */
if (!function_exists('get_resource_http_path')) {
    function get_resource_http_path($src, $url)
    {

        if (substr($src, 0, 4) == 'http' || substr($src, 0, 2) == '//') {
            $imgUrl = $src;
        } else {
            $http = parse_url($url);
            $imgUrl = (
                substr($src, 0, 1) == '/'
                    ? $http['scheme'] . "://" . $http['host']
                    : dirname($url) . "/"
                ) . $src;
        }

        return $imgUrl;
    }
}


/**
 * 创建支付订单记录
 */
if (!function_exists('create_pay_log')) {
    function create_pay_log($userId, $total, $goodsId, $goodsName, $tradeType, $payType = 'dmf')
    {
        do {
            $tradeNo = date("YmdHi") . rand(1111, 9999) . date("s");
            $log = PayLog::where('trade_no', $tradeNo)->first();
        } while ($log);

        $data = [
            'trade_no' => $tradeNo,
            'trade_type' => $tradeType,
            'user_id' => $userId,
            'goods_id' => $goodsId,
            'goods_name' => $goodsName,
            'total_amount' => $total,
            'pay_type' => $payType,
        ];

        $result = (new PayLog)->store($data);

        return $result ? $tradeNo : false;
    }
}

/**
 * 完成支付订单
 */
if (!function_exists('finish_pay_order')) {
    function finish_pay_order($tradeNo)
    {
        PayLog::where('trade_no', $tradeNo)->update(['status' => 1, 'pay_time' => time()]);
    }
}
