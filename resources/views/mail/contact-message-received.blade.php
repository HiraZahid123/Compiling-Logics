<x-mail::message>
# New contact message

**Name:** {{ $contactMessage->name }}<br>
**Email:** {{ $contactMessage->email }}

<x-mail::panel>
{{ $contactMessage->message }}
</x-mail::panel>

Reply to this email to answer {{ $contactMessage->name }} directly.
</x-mail::message>
