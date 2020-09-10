<?php

namespace App\Service;

use App\Entity\ExchangeRates;
use App\Factory\ExchangeRatesFactory;
use App\Repository\ExchangeRatesRepository;

class ExchangeRatesService
{
    private ExchangeRatesRepository $exchangeRatesRepository;

    public function __construct(ExchangeRatesRepository $exchangeRatesRepository)
    {
        $this->exchangeRatesRepository = $exchangeRatesRepository;
    }

    public function getExchangeRates(string $currency, ?string $date = null): ExchangeRates
    {
       $date = $date ?? (new \DateTime())->format('Y-m-d');
       $exchangeRatesData = $this->exchangeRatesRepository->getExchangeRates($currency, $date);

       return ExchangeRatesFactory::fromArray($exchangeRatesData);
    }
}