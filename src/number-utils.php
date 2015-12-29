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