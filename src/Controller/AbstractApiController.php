<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AbstractApiController extends AbstractController
{
    protected function apiResponse($data, int $statusCode = Response::HTTP_OK, ?string $errorMessage = null): JsonResponse
    {
        $response = [
            'status' => $statusCode,
            'data' => $data,
            'error' => $errorMessage
        ];

        return new JsonResponse($response, $statusCode);
    }
}