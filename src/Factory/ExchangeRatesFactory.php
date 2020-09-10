<?php

namespace App\Factory;

use App\Entity\ExchangeRates;

class ExchangeRatesFactory
{
    public static function fromArray(array $array): ExchangeRates
    {
        $exchangeRates = new ExchangeRates();
        $exchangeRates->setCurrency($array['currency']);
        $exchangeRates->setCurrencyCode($array['code']);
        $exchangeRates->setRates($array['rates']);

        return $exchangeRates;
    }
}