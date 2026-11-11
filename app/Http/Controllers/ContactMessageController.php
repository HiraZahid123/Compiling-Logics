<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactMessageController extends Controller
{
    /**
     * Store a message sent from the contact form and email it to the team straight away.
     *
     * The email is sent immediately rather than queued so it does not depend on a queue
     * worker running on the host. The message is already stored, so a mail outage is
     * reported for follow-up instead of failing the visitor's submission.
     */
    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $contactMessage = ContactMessage::create([
            ...$request->safe()->only(['name', 'email']),
            'message' => $request->messageWithPillars(),
        ]);

        try {
            Mail::to(config('mail.contact_recipient'))->sendNow(new ContactMessageReceived($contactMessage));
        } catch (Throwable $exception) {
            report($exception);
        }

        $redirect = $request->input('return_to') === 'services'
            ? to_route('services')->withFragment('contact')
            : to_route('contact');

        return $redirect->with('status', 'contact-message-sent');
    }
}
