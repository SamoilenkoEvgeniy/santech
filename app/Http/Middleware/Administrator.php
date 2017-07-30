<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        return ($user && $user->hasRole("administrator")) ? $next($request) : response()->redirectTo("/login");
    }
}
