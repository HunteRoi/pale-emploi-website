<?php

namespace Classes;

class Employee extends Person
{
    private string|null $company;

    public function __construct($last_name, $first_name, $email, $password, $company)
    {
        parent::__construct($last_name, $first_name, $email, $password);
        $this->company = $company;
    }

    public function __toString()
    {
        return parent::__toString() . (isset($this->company) ? " (employé chez " . $this->company . ")" : "");
    }
}
