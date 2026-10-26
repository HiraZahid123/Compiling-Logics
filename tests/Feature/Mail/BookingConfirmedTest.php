<?php

use App\Mail\BookingConfirmed;
use App\Models\Booking;
use App\Models\Service;
use Carbon\CarbonImmutable;

it('confirms the service and time to the customer in business time', function () {
    config(['booking.timezone' => 'Asia/Karachi']);

    $booking = Booking::factory()->for(Service::factory()->state(['name' => 'Graphics']))->create([
        'starts_at' => CarbonImmutable::parse('2026-11-03 06:00', 'UTC'),
        'name' => 'Ada Lovelace',
    ]);

    $mail = new BookingConfirmed($booking);

    $mail->assertHasSubject('Your Graphics call with Compiling Logics is booked');
    $mail->assertSeeInText("You're booked in, Ada Lovelace");
    $mail->assertSeeInText('Tuesday 3 November 2026, 11:00 (Asia/Karachi)');
});
