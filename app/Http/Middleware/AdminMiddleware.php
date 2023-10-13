<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is an admin (you can replace this logic with your own)
        if (auth()->check() && auth()->user()->role->id == 1) {
            return $next($request);
        }

        // Redirect or return an error response if the user is not an admin
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
