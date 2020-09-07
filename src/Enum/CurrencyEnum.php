<?php

namespace App\Enum;

class CurrencyEnum
{
    public const EURO = 'EUR';
    public const USD = 'USD';

    public static function getCurrencies(): array
    {
        return [
            self::EURO => self::EURO,
            self::USD => self::USD,
        ];
    }
}