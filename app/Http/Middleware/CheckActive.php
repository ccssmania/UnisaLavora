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
            Session::flash("errorMessage", \Lang::get("project.wait_activation"));
            return redirect('/home');
        }

        return $next($request);
    }
}
