<?php

namespace src\database\exceptions;

use Exception;
use Throwable;

class UnknownPropertyException extends Exception
{
    public function __construct(string $name, ?Throwable $previous = null)
    {
        parent::__construct("Error : Tried to fetch an unknown property `$name`", 0, $previous);
    }
}