<?php

namespace Classes\Common;

use UnexpectedValueException;

trait Entity
{
    /**
     * @throws UnexpectedValueException
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            throw new UnexpectedValueException("\"$property\" n'est pas une propriété valide");
        }
    }  
}
