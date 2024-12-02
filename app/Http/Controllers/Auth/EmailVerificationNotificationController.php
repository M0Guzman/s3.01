<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            if($request->user()->hasVerifiedMobile()) {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                $request->user()->sendMobileVerificationNotification();
            }
        } else {
            $request->user()->sendEmailVerificationNotification();
        }

        return back()->with('status', 'verification-link-sent');
    }
}
