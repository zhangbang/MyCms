<?php


namespace Modules\System\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('admin')->check()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['msg' => '无需重复登录.'], 401);
            } else {
                return redirect()->route("system.index");
            }
        }

        return $next($request);
    }
}
