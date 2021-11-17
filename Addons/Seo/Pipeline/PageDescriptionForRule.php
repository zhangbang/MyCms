<?php


namespace Addons\Seo\Pipeline;


use Closure;
use Expand\Pipeline\MyPipeline;

class PageDescriptionForRule implements MyPipeline
{

    public function handle($content, Closure $next)
    {
        $pageIdent = session('the_page');

        if (function_exists("the_{$pageIdent}_description_for_rule")) {
            $content = call_user_func("the_{$pageIdent}_description_for_rule");
        }

        return $next($content);
    }
}
