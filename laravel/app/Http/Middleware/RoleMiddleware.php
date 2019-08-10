<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @param string $role
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        if(auth()->user()->role != $role){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
