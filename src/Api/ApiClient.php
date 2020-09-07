<?php

namespace App\Api;

use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiClient
{
    private ApiClientRequest $apiClientRequest;

    public function __construct(ApiClientRequest $apiClientRequest)
    {
        $this->apiClientRequest = $apiClientRequest;
    }

    public function getResponse(string $method, string $endpoint): ResponseInterface
    {
        $response = $this->apiClientRequest->doRequest($method, $endpoint, $this->prepareOptions());

        return $response;
    }

    private function prepareOptions(): array
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];
    }
}