<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiSign
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
        $params = $request->all();

        if (!isset($params['timestamp']) || abs($params['timestamp'] - time()) > 30) {
            return new JsonResponse(['msg' => '时间错误', 'code' => 401], 401);
        }

        $sign = api_param_sign($params);

        if (!isset($params[env('API_SIGN_NAME')]) || $sign != $params[env('API_SIGN_NAME')]) {
            return new JsonResponse(['msg' => '签名错误', 'code' => 401], 401);
        }

        return $next($request);
    }
}
