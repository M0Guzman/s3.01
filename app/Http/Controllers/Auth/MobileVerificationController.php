<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Fouladgar\MobileVerification\Http\Controllers\BaseVerificationController;
use Fouladgar\MobileVerification\Http\Requests\VerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Routing\Redirector;

class MobileVerificationController extends BaseVerificationController
{
    protected string $redirectTo = RouteServiceProvider::HOME;

    public function process(Request $request) : ViewFactory|JsonResponse|Redirector|RedirectResponse
    {
        if($request->has('action') && $request->input('action') != '') {
            $action = $request->input('action');
            if($action == 'verify') {
                return $this->$action((VerificationRequest::createFrom($request)));
            }
            return $this->$action($request);
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
