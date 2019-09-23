<?php

namespace App\Http\Middleware;

use Closure;

class IsLock
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
        if(\Session::get('locked') === true)
            return redirect('/locked');
        return $next($request);
    }
}
