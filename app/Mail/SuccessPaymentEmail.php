<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessPaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentDetails;
    /**
     * Create a new message instance.
     */
    public function __construct($paymentDetails)
    {
        //
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Successful')
                    ->view('emails.success_payment')
                    ->with('paymentDetails', $this->paymentDetails);
    }
}
