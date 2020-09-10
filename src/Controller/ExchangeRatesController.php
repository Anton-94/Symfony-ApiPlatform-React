<?php

namespace App\Controller;

use App\Exception\ApiException;
use App\Service\ExchangeRatesService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeRatesController extends AbstractApiController
{
    private ExchangeRatesService $exchangeRatesService;

    public function __construct(ExchangeRatesService $exchangeRatesService)
    {
        $this->exchangeRatesService = $exchangeRatesService;
    }

    /**
     * @Route(
     *     name="exchangeRates",
     *     path="/exchange-rates/{currency}",
     *     methods={"GET"}
     * )
     */
    public function index(Request $request, string $currency): Response
    {
        try {
            $exchangeRates = $this->exchangeRatesService->getExchangeRates($currency, $request->get('date'));
        } catch (ApiException $exception) {
            return $this->apiResponse([], Response::HTTP_BAD_REQUEST, $exception->getMessage());
        }

        return $this->apiResponse($exchangeRates->toArray(), Response::HTTP_OK);
    }
}