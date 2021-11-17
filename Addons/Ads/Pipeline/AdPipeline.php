<?php


namespace Addons\Ads\Pipeline;


use Addons\Ads\Models\Ads;
use Closure;
use Expand\Pipeline\MyPipeline;

class AdPipeline implements MyPipeline
{

    public function handle($content, Closure $next)
    {
        $ad = Ads::where('code', $content)->first();
        return $next(($ad !== null ? $ad->content : ''));
    }
}
