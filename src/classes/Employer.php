<?php

namespace Classes;

class Employer extends Employee
{
    private string $sponsor_code;

    public function __construct($id, $last_name, $first_name, $email, $password, $company, $sponsor_code)
    {
        parent::__construct($id, $last_name, $first_name, $email, $password, $company);
        $this->sponsor_code = $sponsor_code;
    }

    public function __toString()
    {
        return parent::__toString() . " (employeur)";
    }
}
