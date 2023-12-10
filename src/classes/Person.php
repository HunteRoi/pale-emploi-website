<?php

namespace Classes;

class Person
{
    use Common\Entity;

    private int $id;
    private string $last_name;
    private string $first_name;
    private string $email;
    private string $password;

    public function __construct($id, $last_name, $first_name, $email, $password)
    {
        $this->id = $id;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->email = $email;
        $this->password = $password;
    }

    public function __toString()
    {
        return $this->first_name . " " . mb_strtoupper($this->last_name);
    }
}
