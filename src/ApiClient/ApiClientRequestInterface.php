<?php

namespace App\ApiClient;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ApiClientRequestInterface
{
    public function doRequest(string $method, string $endpoint, array $options = []): ResponseInterface;
}