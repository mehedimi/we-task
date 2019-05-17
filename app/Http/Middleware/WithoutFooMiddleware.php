<?php

namespace App\Http\Middleware;

use Closure;

class WithoutFooMiddleware
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
        if(session()->has('foo')){

            return back();
        }

        return $next($request);
    }
}
