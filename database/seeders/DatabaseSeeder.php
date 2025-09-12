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
        // 1) Create users and hosts
        $users = User::factory()->count(30)->create();
        $hosts = Host::factory()->count(10)->create();

        // 2) Import Events aus CSV statt Factory
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

