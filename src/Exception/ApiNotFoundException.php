<?php

namespace App\Exception;

class ApiNotFoundException extends \Exception
{
    public function __construct($message = "Brak danych dla danego dnia", $code = 400, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}