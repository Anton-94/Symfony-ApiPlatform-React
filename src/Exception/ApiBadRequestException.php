<?php

namespace App\Exception;

class ApiBadRequestException extends \Exception
{
    public function __construct($message = "Błędna data lub waluta", $code = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}