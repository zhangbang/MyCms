<?php


namespace Addons\Nav\Pipeline;


use Closure;
use Expand\Pipeline\MyPipeline;

class NavsPipeLine implements MyPipeline
{

    public function handle($content, Closure $next)
    {
        $content = app('nav')->childTree();
        return $next($content);
    }
}
