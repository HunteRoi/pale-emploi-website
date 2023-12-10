<?php

namespace Database\Repositories;

use Classes\PersonType;
use Database\Connector;

class PersonRepository
{
    protected Connector $connector;

    public function __construct()
    {
        $this->connector = Connector::getInstance();
    }

    public function getPerson(string $email): ?array
    {
        $statement = $this->connector->createStatement(
            "SELECT id, nom, prenom, email, mot_de_passe, entreprise, code_parrainage
            FROM personne
            WHERE email = ?;"
        );

        $is_success = $statement->execute([$email]);
        if (!$is_success) {
            return NULL;
        }

        $result = $statement->get_result()->fetch_row();
        if (!isset($result)) {
            return NULL;
        }

        return $result;
    }

    public function getPersonType(string $email): ?PersonType
    {
        $statement = $this->connector->createStatement(
            "SELECT code_parrainage
            FROM personne
            WHERE email = ?;"
        );

        $is_success = $statement->execute([$email]);
        if (!$is_success) {
            return NULL;
        }

        $result = $statement->get_result()->fetch_row();
        if (!isset($result)) {
            return NULL;
        }

        return isset($result[0]) ? PersonType::Employer : PersonType::Employee;
    }

    public function login(string $email, string $password): ?PersonType
    {
        $statement = $this->connector->createStatement(
            "SELECT code_parrainage
            FROM personne
            WHERE email = ? AND mot_de_passe = ?;"
        );

        $is_success = $statement->execute([$email, $password]);
        if (!$is_success) {
            return NULL;
        }

        $result = $statement->get_result()->fetch_row();
        if (!isset($result)) {
            return NULL;
        }

        return isset($result[0]) ? PersonType::Employer : PersonType::Employee;
    }
}
