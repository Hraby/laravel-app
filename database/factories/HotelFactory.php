<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'rating' => rand(1, 5),
            'slug' => function (array $hotel) {
                return Str::slug($hotel['name']);
            },
            'price' => rand(50, 1200),
        ];
    }
}
