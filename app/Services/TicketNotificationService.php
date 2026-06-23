<?php

namespace App\Services;

use App\Enums\TicketStatus;
use App\Mail\TicketReplyReceivedMail;
use App\Mail\TicketStatusUpdatedMail;
use App\Mail\TicketSubmittedMail;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class TicketNotificationService
{
    public function ticketSubmitted(Ticket $ticket): void
    {
        Mail::to($ticket->user->email)->send(new TicketSubmittedMail($ticket));
    }

    public function statusUpdated(Ticket $ticket, TicketStatus $previousStatus): void
    {
        if ($ticket->status === TicketStatus::Closed) {
            return;
        }

        Mail::to($ticket->user->email)->send(new TicketStatusUpdatedMail($ticket, $previousStatus));
    }

    public function replyAdded(TicketReply $reply): void
    {
        $ticket = $reply->ticket->load('user');
        $recipients = collect([$ticket->user->email]);

        if ($reply->user_id !== $ticket->user_id) {
            $recipients->push($ticket->user->email);
        }

        User::query()
            ->where('is_admin', true)
            ->pluck('email')
            ->each(fn (string $email) => $recipients->push($email));

        $recipients
            ->unique()
            ->reject(fn (string $email) => $reply->user && $reply->user->email === $email)
            ->each(fn (string $email) => Mail::to($email)->send(new TicketReplyReceivedMail($reply)));
    }
}
