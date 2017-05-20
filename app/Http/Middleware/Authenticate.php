<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        /**
         *Auth::guard($guard)->guest();
         *print false if not guest
         */
        // $u = Auth::guard('api')->user();
        // print_r($u);
        // die();
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                //write url where you want to redirect when click also on logout
                return redirect()->guest('admin');
                // return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
