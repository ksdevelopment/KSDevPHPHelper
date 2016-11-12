<?php


/**
 * @param float $value
 * @param int $decimals
 * @param string $dec_point
 * @param string $thousands_sep
 * @return string
 */
function dk_nf($value, $decimals = 0, $dec_point = ',', $thousands_sep = '.') {
    return is_numeric($value) ? number_format($value, $decimals, $dec_point, $thousands_sep) : '';
}