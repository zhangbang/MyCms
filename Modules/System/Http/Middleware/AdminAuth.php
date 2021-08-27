<?php

namespace Modules\System\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if (auth()->guard('admin')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['msg' => '请登录后操作.'], 401);
            } else {
                return redirect()->route("system.login");
            }
        } else {
            if (auth()->guard('admin')->user()->permission() === false) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['msg' => '权限不足.'], 403);
                } else {
                    return response()->view('system::admin.common.error', ['msg' => '权限不足.'], 403);
                }
            }
        }

        return $next($request);
    }
}
