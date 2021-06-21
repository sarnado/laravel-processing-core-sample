<?php


namespace App\Core;


use App\Models\Currency;

class CardChecker
{
    public function checked(string $card, Currency $currency): bool
    {
        // TODO: check cards in future
        return true;
    }
}
