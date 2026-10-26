<x-mail::message>
# New booking

**Service:** {{ $booking->service->name }} ({{ $booking->service->duration_minutes }} min)<br>
**When:** {{ $startsAt->format('l j F Y, H:i') }} ({{ $startsAt->tzName }})<br>
**Name:** {{ $booking->name }}<br>
**Email:** {{ $booking->email }}<br>
**Phone:** {{ $booking->phone ?: '—' }}

@if ($booking->notes)
<x-mail::panel>
{{ $booking->notes }}
</x-mail::panel>
@endif

Reply to this email to contact {{ $booking->name }} directly.
</x-mail::message>
