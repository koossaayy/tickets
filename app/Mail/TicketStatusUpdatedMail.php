<?php

namespace App\Mail;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Ticket $ticket,
        public TicketStatus $previousStatus,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Ticket Update: :title is now :label', ['title' => $this->ticket->title, 'label' => $this->ticket->status->label()]),
            replyTo: [$this->ticket->replyEmailAddress()],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tickets.status-updated',
            with: [
                'ticket' => $this->ticket,
                'previousStatus' => $this->previousStatus,
                'url' => $this->ticket->publicUrl(),
            ],
        );
    }
}