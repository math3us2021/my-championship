<?php

namespace App\Exceptions;

use Exception;

class MissingParamsExceptions extends Exception
{
    public function __construct($field)
    {
        parent::__construct("The field {$field} is missing.");
    }

}
