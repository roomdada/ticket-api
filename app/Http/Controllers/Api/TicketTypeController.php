<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketTypeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $tiket)
    {
        $ticketTypes = TicketType::where('ticket_type_event_id', $tiket->ticket_event_id)->get();
        $this->responseSuccess('', $ticketTypes);
    }
}