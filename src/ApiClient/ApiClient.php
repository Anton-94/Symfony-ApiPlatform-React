<?php

namespace App\ApiClient;

use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiClient implements ApiClientInterface
{
    private ApiClientRequestInterface $apiClientRequest;

    public function __construct(ApiClientRequestInterface $apiClientRequest)
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