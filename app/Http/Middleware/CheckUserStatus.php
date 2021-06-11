<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
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
        if (Auth::check() && Auth::User()->status != 1) {
            Auth::logout();
            return redirect('/login')->withErrors(['inactiveError' => trans('Your account is disabled by the admin.')]);
        }

        return $next($request);
    }
}
