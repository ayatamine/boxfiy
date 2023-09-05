<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
// use Cache;
use App\Models\User;

class UserActivity
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // $expiresAt = now()->addMinutes(5); 
            // Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);

            // Update last seen
            auth()->user()->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}