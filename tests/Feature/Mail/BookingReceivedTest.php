<?php

use App\Mail\BookingReceived;
use App\Models\Booking;
use App\Models\Service;
use Carbon\CarbonImmutable;

it('gives the team the booking details in business time and replies to the customer', function () {
    config(['booking.timezone' => 'Asia/Karachi']);

    $booking = Booking::factory()->for(Service::factory()->state(['name' => 'Graphics']))->create([
        'starts_at' => CarbonImmutable::parse('2026-11-03 06:00', 'UTC'),
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'notes' => 'Logo refresh',
    ]);

    $mail = new BookingReceived($booking);

    $mail->assertHasSubject('New booking: Graphics with Ada Lovelace');
    $mail->assertHasReplyTo('ada@example.com', 'Ada Lovelace');
    $mail->assertSeeInText('Tuesday 3 November 2026, 11:00 (Asia/Karachi)');
    $mail->assertSeeInText('Logo refresh');
});
