<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsSupervisorOps
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
        //print_r($request->all());die;
        // print_r(Auth::user()['ugroup']);die;
        if (Auth::check() && Auth::user()['ugroup'] !== "SIA") {
           //abort(403, 'Unauthorized action.');
            return redirect('error');
        }
        if(Auth::check() && Auth::user()['logged_first_time'] == 1)
            return redirect()->route('Password');
        if(\Session::get('locked') === true)
            return redirect('/locked');

        return $next($request);
    }
}
