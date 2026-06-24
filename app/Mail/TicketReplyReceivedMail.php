<?php

namespace App\Mail;

use App\Models\TicketReply;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketReplyReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public TicketReply $reply) {}

    public function envelope(): Envelope
    {
        $ticket = $this->reply->ticket;

        return new Envelope(
            subject: __('New Reply on Ticket: :title', ['title' => $ticket->title]),
            replyTo: [$ticket->replyEmailAddress()],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tickets.reply-received',
            with: [
                'reply' => $this->reply,
                'ticket' => $this->reply->ticket,
                'url' => $this->reply->ticket->publicUrl(),
            ],
        );
    }
}