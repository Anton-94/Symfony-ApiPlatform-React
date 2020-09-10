<?php

namespace App\Repository;

use App\ApiClient\ApiClientInterface;

class AbstractApiRepository
{
    public const METHOD_GET = 'GET';

    private ApiClientInterface $apiClient;

    public function __construct(ApiClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function runQuery(string $method, string $endpoint): array
    {
        $apiResponse = $this->apiClient->getResponse($method, $endpoint);

        return json_decode($apiResponse->getContent(), true);
    }

    public function get(string $endpoint): array
    {
        return $this->runQuery(self::METHOD_GET, $endpoint);
    }
}