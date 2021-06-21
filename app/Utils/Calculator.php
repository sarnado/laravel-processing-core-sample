<?php


namespace App\Utils;


use JetBrains\PhpStorm\Pure;

class Calculator
{
    public const PRECISION = 5;

    #[Pure]
    public static function plus($num1, $num2, int $precision = self::PRECISION): string
    {
        $num1 = NumFormatter::format($num1);
        $num2 = NumFormatter::format($num2);
        return bcadd($num1, $num2, $precision);
    }

    #[Pure]
    public static function minus($num1, $num2, int $precision = self::PRECISION): string
    {
        $num1 = NumFormatter::format($num1);
        $num2 = NumFormatter::format($num2);
        return bcsub($num1, $num2, $precision);
    }

    #[Pure]
    public static function multiply($num1, $num2, int $precision = self::PRECISION): string
    {
        $num1 = NumFormatter::format($num1);
        $num2 = NumFormatter::format($num2);
        return bcmul($num1, $num2, $precision);
    }

    #[Pure]
    public static function divide($num1, $num2, int $precision = self::PRECISION): string
    {
        $num1 = NumFormatter::format($num1);
        $num2 = NumFormatter::format($num2);
        return bcdiv($num1, $num2, $precision);
    }
}
