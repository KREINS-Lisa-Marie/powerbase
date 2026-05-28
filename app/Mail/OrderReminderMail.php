<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct( User $user)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rappel commande — Order Reminder — Bestellungserinnerung',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.order-reminder',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
