<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SuccessPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // Mock payment details
        $paymentDetails = [
            'name' => $this->user->name,
            'amount' => 2000, // In cents (e.g., $20.00)
            'transaction_id' => 'txn_1234567890',
        ];
        Mail::to($this->user->email)->send(new \App\Mail\SuccessPaymentEmail($paymentDetails));
    
    }
}
