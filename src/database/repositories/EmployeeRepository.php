<?php

namespace Database\Repositories;

use Classes\Employee;

class EmployeeRepository extends PersonRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(string $email): ?Employee
    {
        $result = parent::getPerson($email);

        if (!$result) {
            return NULL;
        }

        [$lastname, $firstname, $email, $password, $company] = $result;

        return new Employee($lastname, $firstname, $email, $password, $company);
    }

    public function create(string $lastname, string $firstname, string $email, string $password, string $company = NULL): bool
    {
        $statement = $this->connector->createStatement("INSERT INTO personne (nom, prenom, email, mot_de_passe, entreprise) VALUES (?, ?, ?, ?, ?);");

        return $statement->execute([$lastname, $firstname, $email, $password, $company]);
    }

    public function registerAsEmployer($email, int $code_id, string $company_name): bool
    {
        $statement = $this->connector->createStatement("UPDATE personne SET entreprise = ?, code_parrainage = ? WHERE email = ?;");

        return $statement->execute([$company_name, $code_id, $email]);
    }
}
