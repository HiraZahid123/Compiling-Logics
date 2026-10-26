<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Service;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class BookingAvailability
{
    /**
     * Get every bookable day in the booking window with its free start times.
     *
     * @return list<array{date: string, label: string, slots: list<string>}>
     */
    public function days(Service $service): array
    {
        $firstDay = $this->now()->startOfDay();
        $lastDay = $firstDay->addDays(config('booking.days_ahead'));
        $bookings = $this->bookingsBetween($firstDay, $lastDay->endOfDay());

        $days = [];

        for ($day = $firstDay; $day->lte($lastDay); $day = $day->addDay()) {
            $slots = $this->slotsOn($service, $day, $bookings);

            if ($slots !== []) {
                $days[] = [
                    'date' => $day->toDateString(),
                    'label' => $day->format('D j M'),
                    'slots' => array_map(fn (CarbonImmutable $slot): string => $slot->format('H:i'), $slots),
                ];
            }
        }

        return $days;
    }

    /**
     * Determine whether the service can start at the given business-time moment.
     */
    public function isAvailable(Service $service, CarbonImmutable $startsAt): bool
    {
        $startsAt = $startsAt->setTimezone($this->timezone());

        if ($startsAt->startOfDay()->gt($this->now()->startOfDay()->addDays(config('booking.days_ahead')))) {
            return false;
        }

        $slots = $this->slotsOn($service, $startsAt->startOfDay(), $this->bookingsBetween($startsAt->startOfDay(), $startsAt->endOfDay()));

        return collect($slots)->contains(fn (CarbonImmutable $slot): bool => $slot->eq($startsAt));
    }

    /**
     * Parse a business-time date and time into a moment.
     */
    public function parse(string $date, string $time): CarbonImmutable
    {
        return CarbonImmutable::createFromFormat('Y-m-d H:i', "{$date} {$time}", $this->timezone())->startOfMinute();
    }

    /**
     * Get the free start times on a single day.
     *
     * @param  Collection<int, Booking>  $bookings
     * @return list<CarbonImmutable>
     */
    private function slotsOn(Service $service, CarbonImmutable $day, Collection $bookings): array
    {
        if (! in_array($day->dayOfWeekIso, config('booking.working_days'), true)) {
            return [];
        }

        $opensAt = $day->setTimeFromTimeString(config('booking.opens_at'));
        $closesAt = $day->setTimeFromTimeString(config('booking.closes_at'));
        $earliestStart = $this->now()->addMinutes(config('booking.minimum_notice_minutes'));

        $slots = [];

        for ($startsAt = $opensAt; $startsAt->addMinutes($service->duration_minutes)->lte($closesAt); $startsAt = $startsAt->addMinutes(config('booking.slot_interval_minutes'))) {
            $endsAt = $startsAt->addMinutes($service->duration_minutes);

            $isTaken = $bookings->contains(fn (Booking $booking): bool => $booking->starts_at->lt($endsAt) && $booking->ends_at->gt($startsAt));

            if ($startsAt->gte($earliestStart) && ! $isTaken) {
                $slots[] = $startsAt;
            }
        }

        return $slots;
    }

    /**
     * Load the bookings that overlap a business-time period.
     *
     * @return Collection<int, Booking>
     */
    private function bookingsBetween(CarbonImmutable $from, CarbonImmutable $to): Collection
    {
        return Booking::query()->overlapping($from->utc(), $to->utc())->get(['starts_at', 'ends_at']);
    }

    private function now(): CarbonImmutable
    {
        return CarbonImmutable::now($this->timezone());
    }

    private function timezone(): string
    {
        return config('booking.timezone');
    }
}
