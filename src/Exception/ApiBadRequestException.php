<?php

namespace App\Exception;

class ApiBadRequestException extends \Exception
{
    public function __construct($message = "Limit of 93 days has been exceeded", $code = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}