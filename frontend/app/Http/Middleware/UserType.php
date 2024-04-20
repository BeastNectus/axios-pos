<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$userTypes)
    {
        if (auth()->check() && !in_array(auth()->user()->user_type, $userTypes)) {
            return redirect()->back()->with('error', 'You are not authorized to access it.');
        }

        return $next($request);
    }
}
