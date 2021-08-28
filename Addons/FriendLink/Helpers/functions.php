<?php
/*
 * 获取友情链接
 */

use Addons\FriendLink\Models\FriendLink;

if (!function_exists('friend_link')) {
    function friend_link()
    {
        return FriendLink::orderBy('sort', 'asc')->get();
    }
}
