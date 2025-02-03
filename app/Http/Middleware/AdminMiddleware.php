<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and position is 'admin'
        if (Auth::check() && Auth::user()->position === 'Admin') {
            return $next($request);
        }

        // Redirect unauthorized users
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
}
