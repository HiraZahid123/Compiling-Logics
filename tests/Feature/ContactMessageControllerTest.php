<?php

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

beforeEach(function () {
    Mail::fake();
    config(['mail.contact_recipient' => 'team@compilinglogics.test']);
});

it('stores the message and emails it to the team immediately', function () {
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

    Mail::assertNothingQueued();
    Mail::assertSent(
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
    Mail::assertNothingSent();
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

it('records the picked pillars and returns to the services contact section', function () {
    $this->post(route('contact.store'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'message' => 'We need a booking system.',
        'pillars' => ['Software Development', 'Design'],
        'return_to' => 'services',
    ])->assertRedirect(route('services').'#contact');

    expect(ContactMessage::sole()->message)
        ->toBe("Pillars of interest: Software Development, Design\n\nWe need a booking system.");
});

it('rejects an unknown return destination', function () {
    $this->post(route('contact.store'), [
        ...ContactMessage::factory()->raw(),
        'return_to' => 'https://example.com',
    ])->assertSessionHasErrors('return_to');

    expect(ContactMessage::count())->toBe(0);
});

it('keeps the message and still thanks the visitor when the mail server is down', function () {
    Exceptions::fake();
    Mail::shouldReceive('to')->andThrow(new TransportException('Connection could not be established'));

    $this->post(route('contact.store'), ContactMessage::factory()->raw())
        ->assertRedirect(route('contact'))
        ->assertSessionHas('status', 'contact-message-sent');

    expect(ContactMessage::count())->toBe(1);
    Exceptions::assertReported(TransportException::class);
});

describe('with reCAPTCHA enabled', function () {
    beforeEach(function () {
        config(['services.recaptcha.secret_key' => 'test-secret']);
    });

    it('rejects a submission without the captcha tick', function () {
        Http::fake();

        $this->post(route('contact.store'), ContactMessage::factory()->raw())
            ->assertSessionHasErrors(['g-recaptcha-response' => 'Please confirm you\'re not a robot.']);

        expect(ContactMessage::count())->toBe(0);
        Http::assertNothingSent();
    });

    it('rejects a token that Google does not accept', function () {
        Http::fake(['www.google.com/recaptcha/api/siteverify' => Http::response(['success' => false])]);

        $this->post(route('contact.store'), [...ContactMessage::factory()->raw(), 'g-recaptcha-response' => 'bad-token'])
            ->assertSessionHasErrors(['g-recaptcha-response' => 'Please confirm you\'re not a robot.']);

        expect(ContactMessage::count())->toBe(0);
        Mail::assertNothingSent();
    });

    it('accepts a token that Google verifies', function () {
        Http::fake(['www.google.com/recaptcha/api/siteverify' => Http::response(['success' => true])]);

        $this->post(route('contact.store'), [...ContactMessage::factory()->raw(), 'g-recaptcha-response' => 'good-token'])
            ->assertSessionHasNoErrors()
            ->assertSessionHas('status', 'contact-message-sent');

        expect(ContactMessage::count())->toBe(1);
        Http::assertSent(fn ($request): bool => $request['secret'] === 'test-secret' && $request['response'] === 'good-token');
    });
});

it('records the chosen industry and returns to the work page form', function () {
    $this->post(route('contact.store'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'message' => 'We need a patient portal.',
        'industry' => 'healthcare',
        'return_to' => 'work',
    ])->assertRedirect(route('work').'#contact');

    expect(ContactMessage::sole()->message)->toBe("Industry: Healthcare\n\nWe need a patient portal.");
});

it('rejects an industry that is not on the list', function () {
    $this->post(route('contact.store'), [...ContactMessage::factory()->raw(), 'industry' => 'casino'])
        ->assertSessionHasErrors('industry');

    expect(ContactMessage::count())->toBe(0);
});
