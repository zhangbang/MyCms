<?php
/*
 * 获取友情链接
 */

use Addons\FriendLink\Models\FriendLink;

if (!function_exists('hook_friend_link')) {
    function hook_friend_link()
    {
        $config = system_config([],'friend_link');
        if ($config['friend_link_show'] == 'home' && !is_home()) {
            return [];
        }
        return FriendLink::orderBy('sort', 'asc')->get();
    }
}
