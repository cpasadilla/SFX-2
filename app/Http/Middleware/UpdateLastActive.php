<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UpdateLastActive
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->lastActive === null || $user->lastActive->diffInMinutes(now()) > 10) {
                $user->lastActive = now();
                $user->save();
            }
        }

        return $next($request);
    }
}

