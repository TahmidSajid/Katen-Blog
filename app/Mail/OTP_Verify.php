<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OTP_Verify extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_info;

    /**
     * Create a new message instance.
     */
    public function __construct($x,$y)
    {
        $this->mail_info = [$x,$y];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'OTP to Verify',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.otp_verification',
            with:[
                'OTP' => $this->mail_info[0],
                'new_email' => $this->mail_info[1],
                'current_email' => auth()->user()->email,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
