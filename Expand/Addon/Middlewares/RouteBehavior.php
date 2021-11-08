<?php


namespace Expand\Addon\Middlewares;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteBehavior
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $this->rule($request, $response);

        return $response;
    }

    /**
     * 监听规则
     */
    protected function rule(Request $request, Response $response)
    {

        $method = $request->method();
        $path = $request->path();

        if ($request->route() === null) {
            return false;
        }

        $middlewares = $request->route()->middleware();
        $statusCode = $response->getStatusCode();

        $rules = [
            "url:{$path}:{$method}:{$statusCode}",
            "url:{$path}:{$statusCode}",
            "*:{$method}:{$statusCode}",
            "*:{$statusCode}"
        ];

        $name = $request->route()->getName();

        if ($name) {

            $name = str_replace(".", "_", $name);

            $rules[] = "name:{$name}:{$method}:{$statusCode}";
            $rules[] = "name:{$name}:{$statusCode}";

        }

        $tag = $request->route()->getAction('tag');

        if ($tag) {

            $tag = str_replace(".", "_", $tag);
            $rules[] = "tag:{$tag}:{$method}:{$statusCode}";
            $rules[] = "tag:{$tag}:{$statusCode}";

        }

        foreach ($middlewares as $middleware) {
            $middleware = str_replace(".", "_", $middleware);
            $rules[] = "md:{$middleware}:{$method}:{$statusCode}";
            $rules[] = "md:{$middleware}:{$statusCode}";
        }

        foreach ($rules as $rule) {

            $classes = config("behavior.{$rule}") ?: [];
            foreach ($classes as $class) {
                $class && event(new $class($request, $response));
            }

        }

    }
}
