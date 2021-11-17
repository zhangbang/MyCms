<?php


namespace Addons\FriendLink\Pipeline;


use Addons\FriendLink\Models\FriendLink;
use Closure;
use Expand\Pipeline\MyPipeline;

class FriendLinkPipeLine implements MyPipeline
{

    public function handle($content, Closure $next)
    {
        $config = system_config([],'friend_link');

        if (isset($config['friend_link_show']) && $config['friend_link_show'] == 'home' && !is_home()) {
            return [];
        }
        $content = FriendLink::orderBy('sort', 'asc')->get();

        return $next($content);
    }
}
