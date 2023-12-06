<?php

namespace Database\Repositories;

use Database\Connector;

class SponsorCodeRepository
{
    private Connector $connector;

    public function __construct()
    {
        $this->connector = Connector::getInstance();
    }

    public function getByCode(string $code): ?int
    {
        $statement = $this->connector->createStatement(
            "SELECT id FROM code_parrainage WHERE code = ? AND date_affiliation IS NULL;"
        );
        $is_success = $statement->execute([$code]);

        if (!$is_success) {
            return NULL;
        }


        $rows = $statement->get_result()->fetch_row();
        if (!isset($rows)) {
            return NULL;
        }

        [$id] = $rows;

        return $id;
    }

    public function updateAffiliationDate(int $id): bool
    {
        $statement = $this->connector->createStatement(
            "UPDATE code_parrainage SET date_affiliation = NOW() WHERE id = ?;"
        );

        return $statement->execute([$id]);
    }
}