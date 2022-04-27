<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginUrlCheck
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
        if (Session()->has('user_id') && (url('/auth/user/login') == $request->url() || url('/auth/user/register') == $request->url() )){
            return back();
        }
        return $next($request);
    }
}
