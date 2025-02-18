<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| paymentgateway Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your package.
|
*/

/* ----------------------------------------
    STRIPE ROUTE
---------------------------------------- */
Route::group(['middleware' => 'web'],function (){
    /**
     *  STRIPE PAYMENT ROUTE
     * */
    Route::post('cst-payment-gateway/stipe',[\Cst\PaymentGateway\Http\Controllers\StripePaymentController::class,'charge_customer'])->name('xg.payment.gateway.stripe');
    Route::post('cst-payment-gateway/paystack',[\Cst\PaymentGateway\Http\Controllers\PaystackPaymentController::class,'redirect_to_gateway'])->name('xg.payment.gateway.paystack');
    Route::get('cst-payment-gateway/paystack-callback',[\Cst\PaymentGateway\Http\Controllers\PaystackPaymentController::class,'callback'])->name('xg.payment.gateway.paystack.callback');
});

