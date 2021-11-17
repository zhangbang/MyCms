<?php


namespace Expand\Pipeline;


use Closure;

interface MyPipeline
{
    public function handle($content, Closure $next);
}
