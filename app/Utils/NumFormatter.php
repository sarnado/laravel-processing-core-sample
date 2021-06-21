<?php


namespace App\Utils;


class NumFormatter
{
    public static function format($num, int $precision = 5): string
    {
        return number_format($num, $precision, '.', '');
    }
}
