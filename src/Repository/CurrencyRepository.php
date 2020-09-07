<?php

namespace App\Repository;

class CurrencyRepository extends NBPRepository
{
    public function getCurrencyRates(string $currency, ?string $date): array
    {
        return $this->get(sprintf('/exchangerates/rates/A/%s/%s', $currency, $date));
    }
}