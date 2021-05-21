<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthLogout
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
        if($request->path()=='home' && !$request->session()->has('user')){
            return redirect('login');
        }
        return $next($request);
    }
}