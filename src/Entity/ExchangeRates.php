<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={
 *         "exchange-rates"={
 *             "method"="GET",
 *             "route_name"="exchangeRates",
 *             "openapi_context"={
 *                 "parameters"={
 *                     {
 *                        "name" = "currency",
 *                        "in" = "path",
 *                        "required" = "true",
 *                        "type" = "string"
 *                     },
 *                     {
 *                        "name" = "date",
 *                        "in" = "query",
 *                        "type" = "string"
 *                     }
 *                 },
 *                 "responses" = {
 *                      "200" = {
 *                          "description" = "Exchange rates response",
 *                          "content": {
 *                              "application/json": {
 *                                  "schema": {
 *                                      "type": "object",
 *                                      "properties": {
 *                                          "status": {"type": "string"},
 *                                          "data": {"type": "string"},
 *                                          "error": {"type": "string"},
 *                                      },
 *                                  },
 *                              },
 *                          },
 *                      },
 *                      "400" = {
 *                          "description" = "Bad request or Limit of 93 days has been exceeded",
 *                      },
 *                      "404" = {
 *                          "description" = "No data for the selected day",
 *                      },
 *                  }
 *             }
 *         }
 *     }
 * )
 */
class ExchangeRates
{
    private string $currency;
    private string $currencyCode;
    private array $rates;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    public function getRates(): array
    {
        return $this->rates;
    }

    public function setRates(array $rates): void
    {
        $this->rates = $rates;
    }

    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'currencyCode' => $this->currencyCode,
            'rates' => $this->rates
        ];
    }
}