<?php

namespace App\Factory;

use App\Entity\Currency;

class CurrencyFactory
{
    public static function fromNBPResponse(array $array): Currency
    {
        $nbpCurrency = new Currency();
        $nbpCurrency->setCurrency($array['currency']);
        $nbpCurrency->setCurrencyCode($array['code']);
        $nbpCurrency->setRates($array['rates']);

        return $nbpCurrency;
    }
}