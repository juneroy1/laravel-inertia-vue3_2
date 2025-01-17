<?php

namespace App\Http\Controllers;

use App\Jobs\SuccessPayment;
use App\Models\User;
use App\Http\Requests\CreateCheckoutSessionRequest;
use App\Services\StripeService;

class PaymentController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService){
        $this->stripeService = $stripeService;
    }

    public function createCheckoutSession(CreateCheckoutSessionRequest $request)
    {
        // use the validated price from the form request
        $price = $request->validated()['price'];

        // delegate the session creation to the Stripe service
        $session = $this->stripeService->createCheckoutSession($price);

        // return the session ID to the frontend
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
