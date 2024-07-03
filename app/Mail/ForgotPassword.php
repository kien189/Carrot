<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $customer;
    public $token;

    public function __construct($customer, $token)
    {
        $this->customer = $customer;
        $this->token = $token;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password Carrot',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'Fe.Mail.forgotPassword',
            with: [
                'customer' => $this->customer,
                'token' => $this->token,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
