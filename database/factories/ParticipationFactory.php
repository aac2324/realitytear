<?php

namespace Database\Factories;

use App\Models\Participation;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipationFactory extends Factory
{
    protected $model = Participation::class;

    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'event_id'   => Event::factory(), // override later to use imported ids
            'attendance' => $this->faker->boolean(70), // 70% attended
        ];
    }
}

