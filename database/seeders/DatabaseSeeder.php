<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Host;
use App\Models\Event;
use App\Models\Review;
use App\Models\Participation;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(30)->create(['role' => 'user']);

        // explizit Hosts anlegen
        User::factory()->count(10)->create(['role' => 'host']);

        // Events auf Hosts verweisen
        $hosts = User::where('role', 'host')->get();
        Event::factory()->count(30)->create([
            'organizer_id' => fn() => $hosts->random()->id
        ]);

        // 2) Import Events from CSV instead of Factory
        $this->call(EventCsvSeeder::class);
        $events = \App\Models\Event::all();

        // 3) Reviews (one per user per event enforced by unique index → so we sample)
        $eventsForReviews = $events->pluck('id');
        foreach ($users as $user) {
            foreach ($eventsForReviews->random(5) as $eventId) {
                Review::factory()->state([
                    'user_id'  => $user->id,
                    'event_id' => $eventId,
                ])->create();
            }
        }

        // 4) Participations (distinct per user+event)
        $eventsForParticipations = $events->pluck('id');
        foreach ($users as $user) {
            foreach ($eventsForParticipations->random(5) as $eventId) {
                Participation::factory()->state([
                    'user_id'  => $user->id,
                    'event_id' => $eventId,
                ])->create();
            }
        }
    }
}

