<?php


namespace Addons\Seo\Pipeline;


use Closure;
use Expand\Pipeline\MyPipeline;

class PageKeywordForRule implements MyPipeline
{

    public function handle($content, Closure $next)
    {
        $pageIdent = session('the_page');

        if (function_exists("the_{$pageIdent}_keyword_for_rule")) {
            $content = call_user_func("the_{$pageIdent}_keyword_for_rule");
        }

        return $next($content);
    }
}
