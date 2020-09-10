<?php

namespace App\Repository;

class ExchangeRatesRepository extends AbstractApiRepository
{
    public function getExchangeRates(string $currency, string $date): array
    {
        return $this->get(sprintf('/exchangerates/rates/A/%s/%s', $currency, $date));
    }
}