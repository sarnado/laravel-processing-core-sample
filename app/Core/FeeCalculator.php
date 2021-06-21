<?php


namespace App\Core;


use App\Utils\Calculator;
use JetBrains\PhpStorm\Pure;

class FeeCalculator
{
    #[Pure]
    public static function calculate(string $amount, string $servicePercent): string
    {
        $feeK = Calculator::divide($servicePercent, '100');
        return Calculator::multiply($amount, $feeK);
    }
}
