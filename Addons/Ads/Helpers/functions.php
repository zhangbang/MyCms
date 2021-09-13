<?php

/*
 * 获取广告内容
 */
if (!function_exists('ad')) {
    function ad($code): string
    {
        $ad = \Addons\Ads\Models\Ads::where('code',$code)->first();
        return $ad !== null ? $ad->content : '';
    }
}
