<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsSupervisor
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
        if (Auth::check() && Auth::user()['ugroup'] !== "SIA") {
            return redirect('error');
        }
        if(Auth::check() && Auth::user()['logged_first_time'] == 1)
            return redirect()->route('Password');
        if(\Session::get('locked') === true)
            return redirect('/locked');
        return $next($request);
    }
}
