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

        // 2) (Optional) Temporary fake events if you want to test before CSV import:
        //    Comment these lines out once you import real events.
        $events = Event::factory()
            ->count(20)
            ->state(fn (array $attributes) => [
                'host_id' => $hosts->random()->id,
            ])->create();

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

