<?php

namespace App\Http\Controllers;

use App\Jobs\SuccessPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        // Set Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create a checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Sample Product',
                    ],
                    'unit_amount' => 2000, // Amount in cents (e.g., $20.00)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return response()->json(['id' => $session->id]);
    }

    public function success()
    {
        $user = User::find(1);
        // Dispatch the job
        SuccessPayment::dispatch($user);
        // call the email notification
        return inertia('Payment/Success');
    }

    public function cancel()
    {
        // call the email notification canceled
        return inertia('Payment/Cancel');
    }
}
