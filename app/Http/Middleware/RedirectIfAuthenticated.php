<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()) {

            if ( auth()->user()->is_verified == 0 ) {
                return redirect( '/verification' ) ;
            }

            if ( auth()->user()->is_avtive == 1 ) {
                return redirect( '/blocked' ) ;
            }

            return redirect('/home') ;
        }

        return $next($request);
    }
}
