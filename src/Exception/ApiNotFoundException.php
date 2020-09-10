<?php

namespace App\Exception;

class ApiNotFoundException extends \Exception
{
    public function __construct($message = "No data for the selected day", $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}