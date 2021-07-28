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
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route("system.login");
            }
        } else {
            if (auth()->guard('admin')->user()->permission() === false) {
                //return response()->view('system::admin.common.error', ['msg' => '权限不足.']);
            }
        }

        return $next($request);
    }
}
