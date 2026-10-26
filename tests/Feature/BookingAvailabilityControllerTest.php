<?php

use App\Models\Booking;
use App\Models\Service;
use Carbon\CarbonImmutable;

beforeEach(function () {
    config(['booking.timezone' => 'Asia/Karachi']);
    $this->travelTo(CarbonImmutable::parse('2026-11-02 08:00', 'Asia/Karachi'));
});

function slotsFor(array $days, string $date): ?array
{
    return collect($days)->firstWhere('date', $date)['slots'] ?? null;
}

it('offers weekday slots inside working hours after the minimum notice', function () {
    $service = Service::factory()->create(['duration_minutes' => 30]);

    $days = $this->getJson(route('bookings.availability', $service))
        ->assertOk()
        ->assertJsonPath('timezone', 'Asia/Karachi')
        ->json('days');

    expect(slotsFor($days, '2026-11-02'))->toBe(['10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30'])
        ->and(slotsFor($days, '2026-11-03'))->toHaveCount(16)
        ->and(slotsFor($days, '2026-11-03')[0])->toBe('09:00');
});

it('does not offer weekends', function () {
    $service = Service::factory()->create();

    $days = $this->getJson(route('bookings.availability', $service))->json('days');

    expect(slotsFor($days, '2026-11-07'))->toBeNull()
        ->and(slotsFor($days, '2026-11-08'))->toBeNull();
});

it('hides start times that would overlap an existing booking', function () {
    $service = Service::factory()->create(['duration_minutes' => 60]);

    Booking::factory()->create([
        'starts_at' => CarbonImmutable::parse('2026-11-03 11:00', 'Asia/Karachi')->utc(),
        'ends_at' => CarbonImmutable::parse('2026-11-03 11:30', 'Asia/Karachi')->utc(),
    ]);

    $slots = slotsFor($this->getJson(route('bookings.availability', $service))->json('days'), '2026-11-03');

    expect($slots)->toContain('10:00', '11:30', '16:00')
        ->not->toContain('10:30', '11:00', '16:30');
});
