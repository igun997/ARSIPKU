<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get("level") == "super_admin") {
          return $next($request);
        }
        return redirect(route("login"))->withError(["msg"=>"Hak Akses Ditolak"]);
    }
}
