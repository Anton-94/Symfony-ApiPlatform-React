<?php

namespace App\Service;

use App\DTO\CurrencyDTO;
use App\Entity\Currency;
use App\Factory\CurrencyFactory;
use App\Repository\CurrencyRepository;

class CurrencyService
{
    private CurrencyRepository $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function getCurrencyRates(CurrencyDTO $currencyDTO): Currency
    {
       $currencyData = $this->currencyRepository->getCurrencyRates($currencyDTO->getCurrency(), $currencyDTO->getDate());

       return CurrencyFactory::fromNBPResponse($currencyData);
    }
}