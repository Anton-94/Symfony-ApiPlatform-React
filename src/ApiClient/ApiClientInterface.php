<?php

namespace App\ApiClient;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ApiClientInterface
{
    public function getResponse(string $method, string $endpoint): ResponseInterface;
}