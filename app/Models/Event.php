<?php

namespace App\Models;

use App\Enums\EventStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $gaurded = [];

    public function scopeActive($query)
    {
        return $query->where('event_status', EventStatusEnum::UPCOMING);
    }
    /**
     * Get the ticket types for the event.
     * @return HasMany
     */
    public function ticketTypes() : HasMany
    {
        return $this->hasMany(TicketType::class, 'ticket_type_event_id');
    }
}