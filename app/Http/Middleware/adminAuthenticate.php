<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminAuthenticate
{

    
    public function handle($request, Closure $next, $guard = 'admin',$guard2 = null )
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect()->back();

    }

}
