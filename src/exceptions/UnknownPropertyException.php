<?php

namespace src\exceptions;

use Exception;
use Throwable;

class UnknownPropertyException extends Exception
{
    public function __construct(?Throwable $previous = null)
    {
        parent::__construct("Error : Tried to fetch an unknown property", 0, $previous);
    }
}