<?php
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserAddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web', 'auth'])->group(function() {
    Route::post('/order/create', [PaymentController::class, 'create_order'])->name('api.payment.paypal.create_order');
    Route::post('/order/approve/{order_id}/capture', [PaymentController::class, 'approve_order'])->name('api.payment.paypal.approve_order');

    Route::post('/payment/braintree/process', [ PaymentController::class, 'process_payment'])->name('api.payment.braintree.process');
});

Route::get('cities', [UserAddressController::class, 'showCities'])->name('autocomplete.cities');
