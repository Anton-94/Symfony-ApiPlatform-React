<?php

namespace App\Repository;

use App\Api\ApiClient;

class NBPRepository
{
    public const METHOD_GET = 'GET';

    private ApiClient $apiClient;

    public function __construct(ApiClient $apiClient)
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