<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Auth;

class AdminOnly
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
        if(Auth::check())
        {
            if(Auth::user()->role=='admin' || Auth::user()->role=='super admin')
            {
                return $next($request);
            }
            else
            {
               return redirect()->intended('/')->with('info','You do not have rights to access this location'); 
            }
            
        }

        return redirect('admin/login');
    }
}
