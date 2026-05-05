<?php

namespace App\Helpers;

if (!function_exists('format_price')) {
    /**
     * Format the price with currency symbol.
     *
     * @param float $price The raw price value.
     * @param string $currency The currency symbol or code.
     * @param int $decimals The number of decimal places.
     * @param string $decimalSeparator The decimal separator character.
     * @param string $thousandsSeparator The thousands separator character.
     * @return string The formatted price.
     */
    function format_price($price, $currency = '$', $decimals = 2, $decimalSeparator = '.', $thousandsSeparator = ',')
    {
        return $currency . number_format($price, $decimals, $decimalSeparator, $thousandsSeparator);
    }
}
