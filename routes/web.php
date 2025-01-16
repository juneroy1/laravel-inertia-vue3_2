<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PaymentController;
Route::get('/', function () {
    sleep(2);
    return Inertia::render('Home', [
        'stripeKey' => config('services.stripe.key'),
    ]);
});

Route::get('/contact', function () {
    sleep(2);
    return Inertia::render('Contact');
});

Route::get('/settings', function () {
    sleep(2);
    return Inertia::render('Settings');
});


Route::get('/payment/success', function () {
    return Inertia::render('Payment/Success');
});

Route::get('/payment/cancel', function () {
    return Inertia::render('Payment/Cancel');
});



Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('checkout.session');

