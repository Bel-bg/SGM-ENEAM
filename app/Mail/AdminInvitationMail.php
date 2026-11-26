<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $invite,
        public string $roleLabel,
        public string $urlInscription
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation à rejoindre l’administration - [SGM]-ENEAM',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-invitation',
        );
    }
}
