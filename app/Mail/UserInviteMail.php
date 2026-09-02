<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct( public User $user , public Company $company, public string $resetUrl)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject:  'Invitation — Invitation — Einladung',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.user-invite',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
