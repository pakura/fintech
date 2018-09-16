<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLockscreen
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
        if (Auth::guard('cms')->guest()) {
            if ($request->expectsJson()) {
                return response()->json('Unauthorized.', 401);
            }

            return redirect()->guest(cms_route('login'));
        }

        return $next($request);
    }
}
