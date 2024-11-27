<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Fouladgar\MobileVerification\Http\Controllers\BaseVerificationController;

class MobileVerificationController extends BaseVerificationController
{
    protected string $redirectTo = RouteServiceProvider::HOME;
}
