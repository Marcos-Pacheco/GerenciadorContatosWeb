<?php

namespace App\Helpers;

class StringHelper
{
    public static function format_phone_number(string $string)
    {
        return substr($string, 0, 3) . '-' . substr($string, 3, 3) . '-' . substr($string, 6);
    }
}
