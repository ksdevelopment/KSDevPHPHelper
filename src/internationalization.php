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


/**
 * @param $value
 * @param string $prefix
 * @param string $sufflix
 * @return string
 */
function dk_money($value, $prefix = '', $sufflix = '') {
    return trim($prefix . ' ' . dk_nf($value, 2) . ' ' . $sufflix);
}


/**
 * Returns dk input formatting string (usage in input fields e.t.c with dk format)
 * @param $value
 * @param null $decimals
 * @return mixed|string
 */
function dk_floatval($value, $decimals = null) {
    if (!is_numeric($value))
        return '';

    if ($decimals !== null) {
        return rtrim(rtrim((string)number_format($value, $decimals, ".", ""), "0"), ".");
    } else {
        return str_replace('.', ',', (string)floatval($value));
    }
}
