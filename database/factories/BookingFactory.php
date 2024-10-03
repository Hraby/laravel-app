<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => \App\Models\Room::factory(),
            'customer_id' => \App\Models\Customer::factory(),
            'check_in' => $this->faker->dateTimeBetween('now', '+1 months'),
            'check_out' => $this->faker->dateTimeBetween('+1 months', '+2 months'),
        ];
    }
}
