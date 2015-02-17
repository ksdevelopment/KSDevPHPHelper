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