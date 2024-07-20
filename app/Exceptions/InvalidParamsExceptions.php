<?php

namespace App\Exceptions;

use Exception;

class InvalidParamsExceptions extends Exception
{
    public function __construct($field)
    {
        parent::__construct("Invalid param: {$field}.");
    }
}
