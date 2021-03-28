<?php

if (!function_exists('clearHtmlWhitespaces'))
{
    /**
     * Clear HTML whitespaces
     *
     * @param string $value
     * @return string
     */
    function clearHtmlWhitespaces($value)
    {
        $string = htmlentities($value, null, 'utf-8');
        $value = trim(trim($string), '&nbsp;');
        return html_entity_decode($value);
    }
}

if (!function_exists('nullEmpty'))
{
    /**
     * Display null if empty
     *
     * @param string $value
     * @return string
     */
    function nullEmpty($value)
    {
        return (!empty($value)) ? $value : null;
    }
}

if (!function_exists('toInteger'))
{
    /**
     * String to integer
     *
     * @param string $value
     * @return string
     */
    function toInteger($value)
    {
        return !empty($value) ? intval($value) : 0;
    }
}

if (!function_exists('toDecimal'))
{
    /**
     * String to decimal
     *
     * @param string $value
     * @return string
     */
    function toDecimal($value)
    {
        return !empty($value) ? floatval($value) : 0;
    }
}