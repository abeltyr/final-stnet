<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!(Auth::guard($guard)->check()) ){
            echo 'bye';
            return redirect()->back();
        }
        else{
            echo 'hello';
        }
       // return $next($request);
    }
}
