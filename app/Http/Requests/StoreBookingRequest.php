<?php

namespace App\Http\Requests;

use App\Models\Service;
use App\Services\BookingAvailability;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreBookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => ['required', 'integer', 'exists:services,id'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required', 'date_format:H:i'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     *
     * @return array<int, callable>
     */
    public function after(BookingAvailability $availability): array
    {
        return [
            function (Validator $validator) use ($availability): void {
                if ($validator->errors()->hasAny(['service_id', 'date', 'time'])) {
                    return;
                }

                if (! $availability->isAvailable($this->service(), $this->startsAt())) {
                    $validator->errors()->add('time', 'That time is no longer available. Please choose another.');
                }
            },
        ];
    }

    /**
     * Get the service being booked.
     */
    public function service(): Service
    {
        return Service::findOrFail($this->integer('service_id'));
    }

    /**
     * Get the requested start time in the business time zone.
     */
    public function startsAt(): CarbonImmutable
    {
        return app(BookingAvailability::class)->parse($this->string('date'), $this->string('time'));
    }
}
