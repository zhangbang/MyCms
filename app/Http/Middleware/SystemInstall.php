<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SystemInstall
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
        $path = $request->path();
        $array = explode("/", $path);

        if (!file_exists(storage_path("installed"))) {
            if (isset($array[0]) && $array[0] != 'install') {
                return redirect()->to("/install");
            }
        }

        return $next($request);
    }
}
