<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentReminder extends Mailable
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
        return $this->subject('Payment Reminder')
                    ->view('emails.payment_reminder')
                    ->with('paymentDetails', $this->paymentDetails);
    }
}
