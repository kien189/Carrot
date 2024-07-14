<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $contact;
    // public $title;
    // public $message;
    public $attachment;
    public function __construct($contact)
    {
        $this->contact = $contact;
        // $this->title = $title;
        // $this->message = $message;
        $this->attachment = $contact['attachment'] ?? null;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Fe.Mail.contactMail',
            with: [
                'contact' => $this->contact,
                // 'title' => $this->title,
                // 'message' => $this->message
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->attachment) {
            $attachments[] = Attachment::fromPath(storage_path('app/public/attachment/' . $this->attachment));
        }

        return $attachments;
    }
}
