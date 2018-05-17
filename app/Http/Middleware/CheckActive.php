<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class CheckActive
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        if ((Auth::user()->active != 1)) {
            Session::flash("errorMessage", "You have to wait for the activation");
            return redirect('/home');
        }

        return $next($request);
    }
}
