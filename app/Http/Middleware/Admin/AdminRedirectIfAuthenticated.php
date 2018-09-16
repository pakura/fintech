<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated
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
        $guard = Auth::guard('cms');

        if ($guard->check() && ! $guard->user()->hasLockScreen()) {
            if ($request->expectsJson()) {
                return response()->json('Forbidden', 403);
            }

            return redirect(cms_route('dashboard'));
        }

        return $next($request);
    }
}
