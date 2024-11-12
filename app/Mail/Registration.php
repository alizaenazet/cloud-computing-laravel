<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
 

class Registration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $email;
     public $username;
    public function __construct($email, $username)
    {
        $this->email = $email;
        $this->username = $username;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env("MAIL_FROM_ADDRESS"), env("MAIL_USERNAME")),
            subject: 'Regis sukses final bos',
        );
    }

    /**
     * Get the message content definition.
     */
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Return a new Content instance with the view and data to be used in the email
        return new Content(
            // Specify the Blade template to be used for the email content
            view: 'emails.registration-successful', // make sure you have this blade file
            // Pass the necessary data to the Blade template
            with: [
                'email' => $this->email, // The email address of the user
                'username' => $this->username, // The username of the user
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
