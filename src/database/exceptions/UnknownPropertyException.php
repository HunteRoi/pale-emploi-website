<?php

namespace Database\Exceptions;

use Exception;
use Throwable;

class UnknownPropertyException extends Exception
{
    public function __construct(string $name, ?Throwable $previous = null)
    {
        parent::__construct("Erreur: propriété inconnue `$name`", 0, $previous);
    }
}
