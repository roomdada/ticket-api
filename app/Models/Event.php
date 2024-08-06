<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'event_id';
    protected $fillable = ['event_category', 'event_title', 'event_description', 'event_date', 'event_image', 'event_city', 'event_address', 'event_status'];

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class, 'ticket_type_event_id');
    }

    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, TicketType::class, 'ticket_type_event_id', 'ticket_ticket_type_id', 'event_id', 'ticket_type_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_event_id');
    }
}