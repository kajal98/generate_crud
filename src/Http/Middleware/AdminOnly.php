<?php

namespace KajalPandya\LaravelCrud\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (in_array(Auth::user()->role, config('crud.admin_roles'), true)) {
                return $next($request);
            }

            return redirect('/')->with('info', 'You do not have rights to access this location');
        }

        return redirect()->route('admin.login');
    }
}
