<x-mail::message>
# You're booked in, {{ $booking->name }}

Thanks for booking a call with Compiling Logics. Here are the details:

**Service:** {{ $booking->service->name }} ({{ $booking->service->duration_minutes }} min)<br>
**When:** {{ $startsAt->format('l j F Y, H:i') }} ({{ $startsAt->tzName }})

We'll be in touch before the call. If you need to change anything, just reply to this email.

Thanks,<br>
Compiling Logics
</x-mail::message>
