<?php

use App\Mail\BookingConfirmed;
use App\Mail\BookingReceived;
use App\Models\Booking;
use App\Models\Service;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    Mail::fake();
    config(['booking.timezone' => 'Asia/Karachi', 'mail.contact_recipient' => 'team@compilinglogics.test']);
    $this->travelTo(CarbonImmutable::parse('2026-11-02 08:00', 'Asia/Karachi'));
    $this->service = Service::factory()->create(['name' => 'Graphics', 'duration_minutes' => 30]);
});

function bookingPayload(array $overrides = []): array
{
    return [
        'date' => '2026-11-03',
        'time' => '11:00',
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'phone' => '+92 300 0000000',
        'notes' => 'Logo refresh',
        ...$overrides,
    ];
}

it('books a free slot and notifies the team and the customer', function () {
    $this->postJson(route('bookings.store'), bookingPayload(['service_id' => $this->service->id]))
        ->assertCreated()
        ->assertExactJson([
            'service' => 'Graphics',
            'starts_at' => 'Tuesday 3 November 2026, 11:00',
            'timezone' => 'Asia/Karachi',
        ]);

    $booking = Booking::sole();

    expect($booking->service->is($this->service))->toBeTrue()
        ->and($booking->starts_at->toIso8601String())->toBe('2026-11-03T06:00:00+00:00')
        ->and($booking->ends_at->toIso8601String())->toBe('2026-11-03T06:30:00+00:00')
        ->and($booking->only(['name', 'email', 'phone', 'notes']))->toBe([
            'name' => 'Ada Lovelace',
            'email' => 'ada@example.com',
            'phone' => '+92 300 0000000',
            'notes' => 'Logo refresh',
        ]);

    Mail::assertQueued(BookingReceived::class, fn (BookingReceived $mail): bool => $mail->hasTo('team@compilinglogics.test') && $mail->booking->is($booking));
    Mail::assertQueued(BookingConfirmed::class, fn (BookingConfirmed $mail): bool => $mail->hasTo('ada@example.com') && $mail->booking->is($booking));
});

it('rejects a slot that overlaps an existing booking', function () {
    Booking::factory()->create([
        'starts_at' => CarbonImmutable::parse('2026-11-03 11:00', 'Asia/Karachi')->utc(),
        'ends_at' => CarbonImmutable::parse('2026-11-03 11:30', 'Asia/Karachi')->utc(),
    ]);

    $this->postJson(route('bookings.store'), bookingPayload(['service_id' => $this->service->id]))
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['time' => 'That time is no longer available. Please choose another.']);

    expect(Booking::count())->toBe(1);
    Mail::assertNothingQueued();
});

it('rejects times outside working hours', function (string $date, string $time) {
    $this->postJson(route('bookings.store'), bookingPayload(['service_id' => $this->service->id, 'date' => $date, 'time' => $time]))
        ->assertJsonValidationErrors(['time' => 'That time is no longer available. Please choose another.']);

    expect(Booking::count())->toBe(0);
})->with([
    'after closing' => ['2026-11-03', '17:00'],
    'before opening' => ['2026-11-03', '08:30'],
    'on a weekend' => ['2026-11-07', '11:00'],
    'inside the notice period' => ['2026-11-02', '09:30'],
    'off the slot grid' => ['2026-11-03', '11:15'],
]);

it('requires the service, time and contact details', function () {
    $this->postJson(route('bookings.store'), [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['service_id', 'date', 'time', 'name', 'email']);
});
