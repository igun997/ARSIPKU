<?php

namespace App\Http\Middleware;

use Closure;

class StaffLain
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
      if (in_array(session()->get("level"),['tata_usaha','kepala_sekolah','guru','wakil_kepala_sekolah','staff_lain'])) {
        return $next($request);
      }
      return redirect(route("login"))->withError(["msg"=>"Hak Akses Ditolak"]);
    }
}
