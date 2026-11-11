<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    /**
     * Store a message sent from the contact form and notify the team.
     */
    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $contactMessage = ContactMessage::create([
            ...$request->safe()->only(['name', 'email']),
            'message' => $request->messageWithPillars(),
        ]);

        Mail::to(config('mail.contact_recipient'))->send(new ContactMessageReceived($contactMessage));

        $redirect = $request->input('return_to') === 'services'
            ? to_route('services')->withFragment('contact')
            : to_route('contact');

        return $redirect->with('status', 'contact-message-sent');
    }
}
