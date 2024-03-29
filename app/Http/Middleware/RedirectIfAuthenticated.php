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
           switch ($guard) {
               case 'admin' :
                   if (Auth::guard($guard)->check()) {
                       return redirect()->route('admin.dashboard');
                   }
                   break;
               default:
                   // If user attempts to view an admin page, redirect them to the admin login page.
                   if (Auth::guard($guard)->check()) {
                       return redirect('admin/login');
                   }
                   break;
           }
        return $next($request);
      }
}
