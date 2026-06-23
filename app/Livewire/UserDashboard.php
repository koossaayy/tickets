<?php

namespace App\Livewire;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class UserDashboard extends Component
{
    use WithPagination;

    public function render(): View
    {
        $ticketsQuery = Ticket::query()->where('user_id', auth()->id());

        $tickets = (clone $ticketsQuery)
            ->withCount('replies')
            ->latest()
            ->paginate(10);

        $counts = (clone $ticketsQuery)
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->all();

        return view('livewire.user-dashboard', [
            'tickets' => $tickets,
            'statuses' => TicketStatus::cases(),
            'counts' => $counts,
        ]);
    }
}
