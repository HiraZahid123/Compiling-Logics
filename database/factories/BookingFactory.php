<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
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
            'service_id' => Service::factory(),
            'starts_at' => $startsAt = CarbonImmutable::now()->addDays(3)->setTime(5, 0),
            'ends_at' => $startsAt->addMinutes(30),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'notes' => fake()->sentence(),
        ];
    }
}
