<?php

namespace App\Api;

use App\Exception\ApiBadRequestException;
use App\Exception\ApiException;
use App\Exception\ApiNotFoundException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiClientRequest
{
    private const BASE_URL = 'http://api.nbp.pl/api';

    private LoggerInterface $logger;
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @throws ApiException
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function doRequest(string $method, string $endpoint, array $headers = []): ResponseInterface
    {
        $uri = sprintf('%s%s', self::BASE_URL, $endpoint);

        try {
            $response = $this->client->request($method, $uri, $headers);

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