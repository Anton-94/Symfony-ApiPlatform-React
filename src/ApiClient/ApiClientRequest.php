<?php

namespace App\ApiClient;

use App\Exception\ApiBadRequestException;
use App\Exception\ApiException;
use App\Exception\ApiNotFoundException;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiClientRequest implements ApiClientRequestInterface
{
    private LoggerInterface $logger;
    private HttpClientInterface $client;
    private ParameterBagInterface $parameterBag;

    public function __construct(HttpClientInterface $client, LoggerInterface $logger, ParameterBagInterface $parameterBag)
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->parameterBag = $parameterBag;
    }

    /**
     * @throws ApiException
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function doRequest(string $method, string $endpoint, array $options = []): ResponseInterface
    {
        $uri = sprintf('%s%s', $this->parameterBag->get('base_api_url'), $endpoint);

        try {
            $response = $this->client->request($method, $uri, $options);

            if ($response->getStatusCode() == Response::HTTP_NOT_FOUND) {
                throw new ApiNotFoundException();
            }

            if ($response->getStatusCode() == Response::HTTP_BAD_REQUEST) {
                throw new ApiBadRequestException();
            }

            return $response;
        } catch (ApiNotFoundException | ApiBadRequestException $exception) {
            throw new ApiException($exception->getMessage());
        }
    }
}