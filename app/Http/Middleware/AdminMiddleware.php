<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard="admin")
    {
        if(! auth()->guard($guard)->check()){
            Auth::guard('admin')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            
            return redirect()->route("admin.login");
        }
        return $next($request);
    }
}
