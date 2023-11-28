<?php

if (!function_exists('indonesianCurrency')) {

    function indonesianCurrency(int $number): String
    {
        return 'Rp. ' . number_format((int) $number, 2, ',',);
    }
}
