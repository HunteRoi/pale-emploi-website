<?php

namespace Database\Repositories;

use Classes\Employer;

class EmployerRepository extends PersonRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get(string $email): ?Employer
    {
        $result = parent::getPerson($email);

        if (!$result) {
            return NULL;
        }

        [$lastname, $firstname, $password, $email, $company, $code] = $result;

        return new Employer($lastname, $firstname, $email, $password, $company, $code);
    }
}
