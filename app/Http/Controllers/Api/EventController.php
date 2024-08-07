<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * @group Events
 * @package App\Http\Controllers\Api
 */
class EventController extends Controller
{
    /**
     * Lister les événements en cours
     * @return mixed
     * @throws BindingResolutionException
     */
    public function index()
    {
        return response()->json(Event::active()->get());
    }
    /**
     * Récupérer les types de billets pour un événement donné
     * @param Event $event
     * @return void
     */
    public function getTicketTypes(Event $event)
    {
        return response()->json($event->load('ticketTypes'));
    }

}