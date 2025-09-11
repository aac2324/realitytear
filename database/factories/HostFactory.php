<?php

namespace Database\Factories;

use App\Models\Host;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostFactory extends Factory
{
    protected $model = Host::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),  // ✅ Pflichtfeld name
        ];
    }
}


