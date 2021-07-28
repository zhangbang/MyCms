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
            return redirect()->route("system.home");
        }
        return $next($request);
    }
}
