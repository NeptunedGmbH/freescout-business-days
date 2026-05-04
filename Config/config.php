<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Company Holidays
    |--------------------------------------------------------------------------
    |
    | Dates (Y-m-d) on which the "Today is a Business Day" condition evaluates
    | to false, even if the day falls on a weekday.
    |
    | The list below is pre-filled with all public holidays for Hessen
    | (Germany) from 2026 through 2050, sourced from nager.date.
    | The 10 annual Hessian holidays are:
    |   Neujahr, Karfreitag, Ostermontag, Tag der Arbeit,
    |   Christi Himmelfahrt, Pfingstmontag, Fronleichnam,
    |   Tag der Deutschen Einheit, 1. + 2. Weihnachtstag.
    |
    | To add company-specific closures (e.g. Brückentage), simply append
    | additional dates to the array.
    |
    | After editing this file run:
    |   php artisan config:clear
    |   # or in Docker:
    |   docker exec freescout-app php /www/html/artisan config:clear
    |
    */
    'company_holidays' => [

        // 2026
        '2026-01-01', // Neujahr
        '2026-04-03', // Karfreitag
        '2026-04-06', // Ostermontag
        '2026-05-01', // Tag der Arbeit
        '2026-05-14', // Christi Himmelfahrt
        '2026-05-25', // Pfingstmontag
        '2026-06-04', // Fronleichnam
        '2026-10-03', // Tag der Deutschen Einheit
        '2026-12-25', // 1. Weihnachtstag
        '2026-12-26', // 2. Weihnachtstag

        // 2027
        '2027-01-01', // Neujahr
        '2027-03-26', // Karfreitag
        '2027-03-29', // Ostermontag
        '2027-05-01', // Tag der Arbeit
        '2027-05-06', // Christi Himmelfahrt
        '2027-05-17', // Pfingstmontag
        '2027-05-27', // Fronleichnam
        '2027-10-03', // Tag der Deutschen Einheit
        '2027-12-25', // 1. Weihnachtstag
        '2027-12-26', // 2. Weihnachtstag

        // 2028
        '2028-01-01', // Neujahr
        '2028-04-14', // Karfreitag
        '2028-04-17', // Ostermontag
        '2028-05-01', // Tag der Arbeit
        '2028-05-25', // Christi Himmelfahrt
        '2028-06-05', // Pfingstmontag
        '2028-06-15', // Fronleichnam
        '2028-10-03', // Tag der Deutschen Einheit
        '2028-12-25', // 1. Weihnachtstag
        '2028-12-26', // 2. Weihnachtstag

        // 2029
        '2029-01-01', // Neujahr
        '2029-03-30', // Karfreitag
        '2029-04-02', // Ostermontag
        '2029-05-01', // Tag der Arbeit
        '2029-05-10', // Christi Himmelfahrt
        '2029-05-21', // Pfingstmontag
        '2029-05-31', // Fronleichnam
        '2029-10-03', // Tag der Deutschen Einheit
        '2029-12-25', // 1. Weihnachtstag
        '2029-12-26', // 2. Weihnachtstag

        // 2030
        '2030-01-01', // Neujahr
        '2030-04-19', // Karfreitag
        '2030-04-22', // Ostermontag
        '2030-05-01', // Tag der Arbeit
        '2030-05-30', // Christi Himmelfahrt
        '2030-06-10', // Pfingstmontag
        '2030-06-20', // Fronleichnam
        '2030-10-03', // Tag der Deutschen Einheit
        '2030-12-25', // 1. Weihnachtstag
        '2030-12-26', // 2. Weihnachtstag

        // 2031
        '2031-01-01', // Neujahr
        '2031-04-11', // Karfreitag
        '2031-04-14', // Ostermontag
        '2031-05-01', // Tag der Arbeit
        '2031-05-22', // Christi Himmelfahrt
        '2031-06-02', // Pfingstmontag
        '2031-06-12', // Fronleichnam
        '2031-10-03', // Tag der Deutschen Einheit
        '2031-12-25', // 1. Weihnachtstag
        '2031-12-26', // 2. Weihnachtstag

        // 2032
        '2032-01-01', // Neujahr
        '2032-03-26', // Karfreitag
        '2032-03-29', // Ostermontag
        '2032-05-01', // Tag der Arbeit
        '2032-05-06', // Christi Himmelfahrt
        '2032-05-17', // Pfingstmontag
        '2032-05-27', // Fronleichnam
        '2032-10-03', // Tag der Deutschen Einheit
        '2032-12-25', // 1. Weihnachtstag
        '2032-12-26', // 2. Weihnachtstag

        // 2033
        '2033-01-01', // Neujahr
        '2033-04-15', // Karfreitag
        '2033-04-18', // Ostermontag
        '2033-05-01', // Tag der Arbeit
        '2033-05-26', // Christi Himmelfahrt
        '2033-06-06', // Pfingstmontag
        '2033-06-16', // Fronleichnam
        '2033-10-03', // Tag der Deutschen Einheit
        '2033-12-25', // 1. Weihnachtstag
        '2033-12-26', // 2. Weihnachtstag

        // 2034
        '2034-01-01', // Neujahr
        '2034-04-07', // Karfreitag
        '2034-04-10', // Ostermontag
        '2034-05-01', // Tag der Arbeit
        '2034-05-18', // Christi Himmelfahrt
        '2034-05-29', // Pfingstmontag
        '2034-06-08', // Fronleichnam
        '2034-10-03', // Tag der Deutschen Einheit
        '2034-12-25', // 1. Weihnachtstag
        '2034-12-26', // 2. Weihnachtstag

        // 2035
        '2035-01-01', // Neujahr
        '2035-03-23', // Karfreitag
        '2035-03-26', // Ostermontag
        '2035-05-01', // Tag der Arbeit
        '2035-05-03', // Christi Himmelfahrt
        '2035-05-14', // Pfingstmontag
        '2035-05-24', // Fronleichnam
        '2035-10-03', // Tag der Deutschen Einheit
        '2035-12-25', // 1. Weihnachtstag
        '2035-12-26', // 2. Weihnachtstag

        // 2036
        '2036-01-01', // Neujahr
        '2036-04-11', // Karfreitag
        '2036-04-14', // Ostermontag
        '2036-05-01', // Tag der Arbeit
        '2036-05-22', // Christi Himmelfahrt
        '2036-06-02', // Pfingstmontag
        '2036-06-12', // Fronleichnam
        '2036-10-03', // Tag der Deutschen Einheit
        '2036-12-25', // 1. Weihnachtstag
        '2036-12-26', // 2. Weihnachtstag

        // 2037
        '2037-01-01', // Neujahr
        '2037-04-03', // Karfreitag
        '2037-04-06', // Ostermontag
        '2037-05-01', // Tag der Arbeit
        '2037-05-14', // Christi Himmelfahrt
        '2037-05-25', // Pfingstmontag
        '2037-06-04', // Fronleichnam
        '2037-10-03', // Tag der Deutschen Einheit
        '2037-12-25', // 1. Weihnachtstag
        '2037-12-26', // 2. Weihnachtstag

        // 2038
        '2038-01-01', // Neujahr
        '2038-04-23', // Karfreitag
        '2038-04-26', // Ostermontag
        '2038-05-01', // Tag der Arbeit
        '2038-06-03', // Christi Himmelfahrt
        '2038-06-14', // Pfingstmontag
        '2038-06-24', // Fronleichnam
        '2038-10-03', // Tag der Deutschen Einheit
        '2038-12-25', // 1. Weihnachtstag
        '2038-12-26', // 2. Weihnachtstag

        // 2039
        '2039-01-01', // Neujahr
        '2039-04-08', // Karfreitag
        '2039-04-11', // Ostermontag
        '2039-05-01', // Tag der Arbeit
        '2039-05-19', // Christi Himmelfahrt
        '2039-05-30', // Pfingstmontag
        '2039-06-09', // Fronleichnam
        '2039-10-03', // Tag der Deutschen Einheit
        '2039-12-25', // 1. Weihnachtstag
        '2039-12-26', // 2. Weihnachtstag

        // 2040
        '2040-01-01', // Neujahr
        '2040-03-30', // Karfreitag
        '2040-04-02', // Ostermontag
        '2040-05-01', // Tag der Arbeit
        '2040-05-10', // Christi Himmelfahrt
        '2040-05-21', // Pfingstmontag
        '2040-05-31', // Fronleichnam
        '2040-10-03', // Tag der Deutschen Einheit
        '2040-12-25', // 1. Weihnachtstag
        '2040-12-26', // 2. Weihnachtstag

        // 2041
        '2041-01-01', // Neujahr
        '2041-04-19', // Karfreitag
        '2041-04-22', // Ostermontag
        '2041-05-01', // Tag der Arbeit
        '2041-05-30', // Christi Himmelfahrt
        '2041-06-10', // Pfingstmontag
        '2041-06-20', // Fronleichnam
        '2041-10-03', // Tag der Deutschen Einheit
        '2041-12-25', // 1. Weihnachtstag
        '2041-12-26', // 2. Weihnachtstag

        // 2042
        '2042-01-01', // Neujahr
        '2042-04-04', // Karfreitag
        '2042-04-07', // Ostermontag
        '2042-05-01', // Tag der Arbeit
        '2042-05-15', // Christi Himmelfahrt
        '2042-05-26', // Pfingstmontag
        '2042-06-05', // Fronleichnam
        '2042-10-03', // Tag der Deutschen Einheit
        '2042-12-25', // 1. Weihnachtstag
        '2042-12-26', // 2. Weihnachtstag

        // 2043
        '2043-01-01', // Neujahr
        '2043-03-27', // Karfreitag
        '2043-03-30', // Ostermontag
        '2043-05-01', // Tag der Arbeit
        '2043-05-07', // Christi Himmelfahrt
        '2043-05-18', // Pfingstmontag
        '2043-05-28', // Fronleichnam
        '2043-10-03', // Tag der Deutschen Einheit
        '2043-12-25', // 1. Weihnachtstag
        '2043-12-26', // 2. Weihnachtstag

        // 2044
        '2044-01-01', // Neujahr
        '2044-04-15', // Karfreitag
        '2044-04-18', // Ostermontag
        '2044-05-01', // Tag der Arbeit
        '2044-05-26', // Christi Himmelfahrt
        '2044-06-06', // Pfingstmontag
        '2044-06-16', // Fronleichnam
        '2044-10-03', // Tag der Deutschen Einheit
        '2044-12-25', // 1. Weihnachtstag
        '2044-12-26', // 2. Weihnachtstag

        // 2045
        '2045-01-01', // Neujahr
        '2045-04-07', // Karfreitag
        '2045-04-10', // Ostermontag
        '2045-05-01', // Tag der Arbeit
        '2045-05-18', // Christi Himmelfahrt
        '2045-05-29', // Pfingstmontag
        '2045-06-08', // Fronleichnam
        '2045-10-03', // Tag der Deutschen Einheit
        '2045-12-25', // 1. Weihnachtstag
        '2045-12-26', // 2. Weihnachtstag

        // 2046
        '2046-01-01', // Neujahr
        '2046-03-23', // Karfreitag
        '2046-03-26', // Ostermontag
        '2046-05-01', // Tag der Arbeit
        '2046-05-03', // Christi Himmelfahrt
        '2046-05-14', // Pfingstmontag
        '2046-05-24', // Fronleichnam
        '2046-10-03', // Tag der Deutschen Einheit
        '2046-12-25', // 1. Weihnachtstag
        '2046-12-26', // 2. Weihnachtstag

        // 2047
        '2047-01-01', // Neujahr
        '2047-04-12', // Karfreitag
        '2047-04-15', // Ostermontag
        '2047-05-01', // Tag der Arbeit
        '2047-05-23', // Christi Himmelfahrt
        '2047-06-03', // Pfingstmontag
        '2047-06-13', // Fronleichnam
        '2047-10-03', // Tag der Deutschen Einheit
        '2047-12-25', // 1. Weihnachtstag
        '2047-12-26', // 2. Weihnachtstag

        // 2048
        '2048-01-01', // Neujahr
        '2048-04-03', // Karfreitag
        '2048-04-06', // Ostermontag
        '2048-05-01', // Tag der Arbeit
        '2048-05-14', // Christi Himmelfahrt
        '2048-05-25', // Pfingstmontag
        '2048-06-04', // Fronleichnam
        '2048-10-03', // Tag der Deutschen Einheit
        '2048-12-25', // 1. Weihnachtstag
        '2048-12-26', // 2. Weihnachtstag

        // 2049
        '2049-01-01', // Neujahr
        '2049-04-16', // Karfreitag
        '2049-04-19', // Ostermontag
        '2049-05-01', // Tag der Arbeit
        '2049-05-27', // Christi Himmelfahrt
        '2049-06-07', // Pfingstmontag
        '2049-06-17', // Fronleichnam
        '2049-10-03', // Tag der Deutschen Einheit
        '2049-12-25', // 1. Weihnachtstag
        '2049-12-26', // 2. Weihnachtstag

        // 2050
        '2050-01-01', // Neujahr
        '2050-04-08', // Karfreitag
        '2050-04-11', // Ostermontag
        '2050-05-01', // Tag der Arbeit
        '2050-05-19', // Christi Himmelfahrt
        '2050-05-30', // Pfingstmontag
        '2050-06-09', // Fronleichnam
        '2050-10-03', // Tag der Deutschen Einheit
        '2050-12-25', // 1. Weihnachtstag
        '2050-12-26', // 2. Weihnachtstag

    ],

];
