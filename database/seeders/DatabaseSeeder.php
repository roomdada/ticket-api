<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $events = Event::factory()->count(20)->create()->each(function ($event) {
            TicketType::factory()->count(3)->create([
                'ticket_type_event_id' => $event->event_id,
            ]);
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ohnt@example.com',
        ]);

    }
}