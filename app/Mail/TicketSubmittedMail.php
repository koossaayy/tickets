<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Ticket $ticket) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Support Ticket Submitted: '.$this->ticket->title,
            replyTo: [$this->ticket->replyEmailAddress()],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tickets.submitted',
            with: [
                'ticket' => $this->ticket,
                'url' => $this->ticket->publicUrl(),
            ],
        );
    }
}
