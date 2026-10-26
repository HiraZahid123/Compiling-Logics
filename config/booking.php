<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Business Time Zone
    |--------------------------------------------------------------------------
    |
    | Working hours below are expressed in this time zone. Bookings are stored
    | in UTC and shown to visitors in this time zone.
    |
    */

    'timezone' => env('BOOKING_TIMEZONE', 'Asia/Karachi'),

    /*
    |--------------------------------------------------------------------------
    | Working Hours
    |--------------------------------------------------------------------------
    |
    | Days use ISO-8601 numbering (1 = Monday, 7 = Sunday). A service can only
    | be booked when it starts and ends inside these hours.
    |
    */

    'working_days' => [1, 2, 3, 4, 5],

    'opens_at' => '09:00',

    'closes_at' => '17:00',

    /*
    |--------------------------------------------------------------------------
    | Slot Rules
    |--------------------------------------------------------------------------
    |
    | Start times are offered every "slot_interval_minutes". Visitors must book
    | at least "minimum_notice_minutes" ahead, and no more than "days_ahead"
    | calendar days into the future.
    |
    */

    'slot_interval_minutes' => 30,

    'minimum_notice_minutes' => 120,

    'days_ahead' => 21,

];
