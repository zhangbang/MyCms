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

if (!function_exists('addon_path')) {
    function addon_path($name, $path = ''): string
    {
        return base_path('Addons/' . $name . $path);
    }
}
