<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'user_id'  => User::factory(),
            'event_id' => Event::factory(), // when you import real events, override this
            'rating'   => $this->faker->numberBetween(1, 5),
            'comment'  => $this->faker->optional(0.6)->realText(140),
        ];
    }
}

