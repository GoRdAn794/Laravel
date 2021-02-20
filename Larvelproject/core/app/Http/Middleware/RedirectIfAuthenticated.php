<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? null : $guards;
        if (!empty($guards)) {
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    if ($guard == 'adminpanel') {
                        return redirect()->route('admindashboard');
                    } elseif ($guard == 'userpanel') {
                        return redirect()->route('userdashboard');
                    }
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        } else {
            if (Auth::check()) {
                return redirect()->route('userdashboard');
            }
        }
        return $next($request);
    }
}
