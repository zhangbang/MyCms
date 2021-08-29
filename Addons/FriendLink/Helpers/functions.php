<?php
/*
 * 获取友情链接
 */

use Addons\FriendLink\Models\FriendLink;

if (!function_exists('hook_friend_link')) {
    function hook_friend_link()
    {
        return FriendLink::orderBy('sort', 'asc')->get();
    }
}
