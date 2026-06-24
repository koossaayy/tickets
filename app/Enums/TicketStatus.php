<?php

namespace App\Enums;

enum TicketStatus: string
{
    case Open = 'open';
    case InProcess = 'in_process';
    case Assigned = 'assigned';
    case Completed = 'completed';
    case Closed = 'closed';

    public function label(): string
    {
        return match ($this) {
            self::Open => __('Open'),
            self::InProcess => __('In Process'),
            self::Assigned => __('Assigned'),
            self::Completed => __('Completed'),
            self::Closed => __('Closed'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Open => 'blue',
            self::InProcess => 'yellow',
            self::Assigned => 'purple',
            self::Completed => 'green',
            self::Closed => 'gray',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $status) => [$status->value => $status->label()])
            ->all();
    }
}