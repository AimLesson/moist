<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Check if the user is authenticated and has 'admin' or 'owner' role
        if ($user && ($user->role === 'admin' || $user->role === 'owner')) {
            return $next($request); // Allow access
        }

        // Redirect to home if not authorized
        return redirect('/');
    }
}
