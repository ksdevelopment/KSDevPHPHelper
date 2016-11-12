<?php


/**
 * Checks if a number is between range of min and max (including min/max)
 * @param $val integer
 * @param $min integer
 * @param $max integer
 * @return bool
 */
function between($val, $min, $max) {
    return ($val >= $min && $val <= $max);
}

if(!function_exists('filesize2str')) {
    function filesize2str($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffix = getKey(floor($base), ['', 'kb', 'mb', 'gb', 'tb', 'pb'], '');

        return str_replace('.',',', round(pow(1024, $base - floor($base)), $precision) .' '. $suffix);
    }
}