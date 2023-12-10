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

    public function getSponsorIdByCode(string $code): ?array
    {
        return $this->connector->multiQuery(
            "SELECT id FROM code_parrainage WHERE date_affiliation IS NULL AND code = $code"
        );
    }

    public function updateAffiliationDate(int $id): bool
    {
        $statement = $this->connector->createStatement(
            "UPDATE code_parrainage SET date_affiliation = NOW() WHERE id = ?;"
        );

        return $statement->execute([$id]);
    }
}
