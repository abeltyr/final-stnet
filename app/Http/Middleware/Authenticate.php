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
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check()) {
            if($request->ajax()){
                return response('Unauthorized.', 401);
            }
            elseif(Auth::guest()){
                return redirect()->route('well');
            }
        }
        elseif(Auth::guard($guard)->user()){
            return redirect()->route('viewadmin');
        }

        return $next($request);
    }
}
