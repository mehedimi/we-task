<?php

namespace App\Http\Middleware;

use Closure;

class FooMiddleware
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
        if(!session()->has('foo')){
            return redirect('setfoo')->withMessage('You must set foo to continue.');
        }

        return $next($request);
    }
}
