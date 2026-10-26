<?php

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    Mail::fake();
    config(['mail.contact_recipient' => 'team@compilinglogics.test']);
});

it('stores the message and emails it to the team', function () {
    $this->post(route('contact.store'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'message' => 'We need a booking system for our clinic.',
    ])
        ->assertRedirect(route('contact'))
        ->assertSessionHas('status', 'contact-message-sent');

    $contactMessage = ContactMessage::sole();

    expect($contactMessage->only(['name', 'email', 'message']))->toBe([
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'message' => 'We need a booking system for our clinic.',
    ]);

    Mail::assertQueued(
        ContactMessageReceived::class,
        fn (ContactMessageReceived $mail): bool => $mail->hasTo('team@compilinglogics.test')
            && $mail->contactMessage->is($contactMessage),
    );
});

it('rejects an empty submission without storing or emailing anything', function () {
    $this->from(route('contact'))
        ->post(route('contact.store'), [])
        ->assertRedirect(route('contact'))
        ->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.',
            'message' => 'The message field is required.',
        ]);

    expect(ContactMessage::count())->toBe(0);
    Mail::assertNothingQueued();
});

it('rejects an invalid email address', function () {
    $this->post(route('contact.store'), [
        'name' => 'Ada Lovelace',
        'email' => 'not-an-email',
        'message' => 'Hello',
    ])->assertSessionHasErrors(['email' => 'The email field must be a valid email address.']);

    expect(ContactMessage::count())->toBe(0);
});

it('returns 429 after five submissions in a minute', function () {
    $payload = ContactMessage::factory()->raw();

    foreach (range(1, 5) as $attempt) {
        $this->post(route('contact.store'), $payload)->assertRedirect(route('contact'));
    }

    $this->post(route('contact.store'), $payload)->assertTooManyRequests();

    expect(ContactMessage::count())->toBe(5);
});
