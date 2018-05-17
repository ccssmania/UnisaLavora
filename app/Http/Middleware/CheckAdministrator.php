<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
class CheckAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ((Auth::user()->roll != 0)) {
            Session::flash("errorMessage", \Lang::get("project.only_administrators"));
            return redirect('/home');
        }

        return $next($request);
    }
}
