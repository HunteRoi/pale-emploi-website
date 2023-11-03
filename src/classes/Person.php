<?php

use src\database\exceptions\UnknownPropertyException;

class Person
{
    private $last_name;
    private $first_name;
    private $email;
    private $password;

    public function __construct($last_name = null, $first_name = null, $email = null, $password = null)
    {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @throws UnknownPropertyException
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            throw new UnknownPropertyException($property);
        }
    }

    public function __toString()
    {
        return $this->last_name . ' ' . $this->first_name;
    }
}