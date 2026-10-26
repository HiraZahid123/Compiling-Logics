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
        $contactMessage = ContactMessage::create($request->validated());

        Mail::to(config('mail.contact_recipient'))->send(new ContactMessageReceived($contactMessage));

        return to_route('contact')->with('status', 'contact-message-sent');
    }
}
