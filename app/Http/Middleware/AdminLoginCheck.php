<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginCheck
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
        if (!Session()->has('admin_id')){
            return redirect('/auth/admin/login')->with('error','please login first');
        }
        return $next($request);
    }
}
