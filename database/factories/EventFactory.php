<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Host;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        // Kept for completeness; you said events come from CSV.
        return [
            'host_id'     => Host::factory(),
            'title'       => $this->faker->sentence(4),
            'description' => $this->faker->optional()->paragraph(),
            'location'    => $this->faker->city(),
            'starts_at'   => $this->faker->dateTimeBetween('+1 days', '+3 months'),
        ];
    }
}
