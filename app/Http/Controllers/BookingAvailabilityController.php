<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\BookingAvailability;
use Illuminate\Http\JsonResponse;

class BookingAvailabilityController extends Controller
{
    /**
     * List the days and start times the service can still be booked.
     */
    public function show(Service $service, BookingAvailability $availability): JsonResponse
    {
        return response()->json([
            'timezone' => config('booking.timezone'),
            'days' => $availability->days($service),
        ]);
    }
}
