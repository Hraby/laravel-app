<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => \App\Models\Hotel::factory(),
            'name' => 'Room ' . $this->faker->randomNumber(3),
            'capacity' => rand(1, 4),
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
