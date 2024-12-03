<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventRegisterAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is not authenticated
        if (!Auth::check()) {
            // Return a 404 response
            return redirect()->route('login')->with('message', 'Please log in to access this page.');
        }

        // If authenticated, allow access
        return $next($request);
    }
}
