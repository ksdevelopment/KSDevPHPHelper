<?php

/**
 * Helper with get key from array or object, with fallback default variable
 *
 * LICENSE: This source file is subject to MIT License
 *
 * @author     Kasper B. Svendsen <ks@ksvendsen.dk>
 * @copyright  2015-2015 KS Development ApS
 * @license    MIT License
 */

/**
 * Quick for getting a key
 * @param $key
 * @param array|object $storage
 * @param null $default
 * @return mixed|null
 */
function getKey($key, $storage, $default = null) {
    if(!$storage) {
        return $default;
    } elseif(is_array($storage)) {
        return isset($storage[$key]) ? $storage[$key] : $default;
    } else if(is_object($storage)) {
        return property_exists($storage, $key) ? $storage->$key : $default; //isset($storage->$key)) ? $storage->$key : $default;
    } else {
        error_log(sprintf("getKey trying to fetch key from unknown storage '%s' ", gettype($storage)), E_NOTICE);
    }
}


/**
 * Map a array with key-value array
 * @param $keys
 * @param array $array
 * @return array
 */
function mapArray($keys, array $array) {
    $data = [];
    foreach($keys as $new => $key) {
        if(isset($array[$key]))
            $data[$new] = $array[$key];
    }

    return $data;
}

/**
 * Map a key to a new name in a array
 * @param $keyFrom
 * @param $keyTo
 * @param $array
 */
function remapKey($keyFrom, $keyTo, &$array)
{
    $array[$keyTo] = $array[$keyFrom];
    unset($array[$keyFrom]);
}

/**
 * Remap af set of keys
 * @param $keys
 * @param $array
 */
function remapKeys($keys, &$array) {
    foreach($keys as $to => $from) {
        remapKey($from, $to, $array);
    }
}

/**
 * Make ISO8601 dates from a list of keys
 * @param array $keys
 * @param $data
 */
function iso8601Dates(array $keys, &$data) {
    foreach($keys as $key) {
        if(array_key_exists($key, $data) && $data[$key]) {
            $data[$key] = date("c", strtotime($data[$key]));
        }
    }
}