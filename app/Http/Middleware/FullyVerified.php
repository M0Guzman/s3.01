<?php

namespace App\Http\Middleware;

use Closure;
use Fouladgar\MobileVerification\Contracts\MustVerifyMobile;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FullyVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if((($user instanceof MustVerifyEmail) && !$user->hasVerifiedEmail()) ||
            (($user instanceof MustVerifyMobile) && !$user->hasVerifiedMobile())) {
            return redirect()->intended('verify');
        }

        return $next($request);
    }
}
