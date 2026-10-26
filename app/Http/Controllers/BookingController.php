<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingConfirmed;
use App\Mail\BookingReceived;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * Book a service, guarding against a slot taken since validation ran.
     */
    public function store(StoreBookingRequest $request): JsonResponse
    {
        $service = $request->service();
        $startsAt = $request->startsAt()->utc();
        $endsAt = $startsAt->addMinutes($service->duration_minutes);

        $booking = DB::transaction(function () use ($request, $service, $startsAt, $endsAt): Booking {
            if (Booking::query()->overlapping($startsAt, $endsAt)->lockForUpdate()->exists()) {
                throw ValidationException::withMessages(['time' => 'That time is no longer available. Please choose another.']);
            }

            return $service->bookings()->create([
                ...$request->safe()->only(['name', 'email', 'phone', 'notes']),
                'starts_at' => $startsAt,
                'ends_at' => $endsAt,
            ]);
        });

        Mail::to(config('mail.contact_recipient'))->send(new BookingReceived($booking));
        Mail::to($booking->email)->send(new BookingConfirmed($booking));

        return response()->json([
            'service' => $service->name,
            'starts_at' => $booking->starts_at->setTimezone(config('booking.timezone'))->format('l j F Y, H:i'),
            'timezone' => config('booking.timezone'),
        ], 201);
    }
}
