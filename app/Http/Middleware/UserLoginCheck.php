<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginCheck
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
        if (!Session()->has('user_id')){
            return redirect('/auth/user/login')->with('error','please login first');
        }
        return $next($request);
    }
}
