<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Company Holidays
    |--------------------------------------------------------------------------
    |
    | List the dates (Y-m-d format) on which the "Today is a Business Day"
    | condition should evaluate to false, even if that day falls on a weekday.
    |
    | The timezone used is the server timezone of your FreeScout installation.
    | Extend this list at the start of each year.
    |
    | After editing this file run:
    |   php artisan config:clear
    |
    */
    'company_holidays' => [
        '2026-01-01', // New Year's Day
        '2026-04-03', // Good Friday
        '2026-05-01', // Labour Day
        '2026-12-25', // Christmas Day
        '2026-12-26', // Boxing Day
    ],

];
