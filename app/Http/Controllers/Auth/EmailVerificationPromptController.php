<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if(!$request->user()->hasVerifiedEmail()) {
            return view('auth.verify-email');
        } elseif (!$request->user()->hasVerifiedMobile()) {
            return view('auth.verify-phone');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
