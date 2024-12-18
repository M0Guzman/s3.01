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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Vérifie si l'utilisateur a le bon rôle
        if (!$user || $user->role !== $role) {
            return redirect('/'); // Redirection si l'utilisateur n'a pas le bon rôle
        }

        return $next($request);
    }
}
