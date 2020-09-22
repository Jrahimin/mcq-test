<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $paymentInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $paymentInfo)
    {
        $this->user = $user;
        $this->paymentInfo = $paymentInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.payment-confirm');
    }
}
