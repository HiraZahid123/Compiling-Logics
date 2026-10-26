<?php

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;

it('shows the sender and message and replies to the sender', function () {
    $contactMessage = ContactMessage::factory()->create([
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'message' => 'We need a booking system for our clinic.',
    ]);

    $mail = new ContactMessageReceived($contactMessage);

    $mail->assertHasSubject('New contact message from Ada Lovelace');
    $mail->assertHasReplyTo('ada@example.com', 'Ada Lovelace');
    $mail->assertSeeInText('ada@example.com');
    $mail->assertSeeInText('We need a booking system for our clinic.');
});
