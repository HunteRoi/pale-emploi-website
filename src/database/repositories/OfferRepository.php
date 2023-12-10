<?php

namespace Database\Repositories;

use Classes\Employer;
use Classes\Offer;
use Database\Connector;
use DateTimeImmutable;

class OfferRepository
{
    private Connector $connector;

    public function __construct()
    {
        $this->connector = Connector::getInstance();
    }

    public function getById(int $id): ?Offer
    {
        $rows = $this->connector->query(
            "SELECT o.id, o.titre, o.description, o.ville, o.date_publication, 
            p.id, p.nom, p.prenom, p.email, p.mot_de_passe, p.entreprise, p.code_parrainage
            FROM offre_emploi as o
            LEFT JOIN personne as p ON o.employeur_id = p.id
            WHERE o.id = $id;"
        );

        if (!$rows) {
            return NULL;
        }

        $result = $rows->fetch_row();

        if (!$result) {
            return NULL;
        }

        return new Offer(
            $result[0], $result[1], $result[2], $result[3], isset($result[4]) ? new DateTimeImmutable($result[4]) : $result[4],
            new Employer($result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11])
        );
    }

    public function get(): ?array
    {
        $rows = $this->connector->query(
            "SELECT o.id, o.titre, o.description, o.ville, o.date_publication, 
            p.id, p.nom, p.prenom, p.email, p.mot_de_passe, p.entreprise, p.code_parrainage
            FROM offre_emploi as o
            LEFT JOIN personne as p ON o.employeur_id = p.id
            WHERE p.code_parrainage IS NOT NULL;"
        );

        if (!$rows) {
            return NULL;
        }

        $results = $rows->fetch_all();

        if (!$results) {
            return [];
        }

        $offers = [];
        foreach ($results as $result) {
            $offers[] = new Offer(
                $result[0], $result[1], $result[2], $result[3], isset($result[4]) ? new DateTimeImmutable($result[4]) : $result[4],
                new Employer($result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11])
            );
        }

        return $offers;
    }

    public function create(Employer $employer, string $title, string $description, string $city): ?int
    {
        $statement = $this->connector->createStatement(
            'INSERT INTO offre_emploi (titre, description, ville, date_publication, employeur_id) VALUES (?, ?, ?, ?, ?);',
        );

        $result = $statement->execute([$title, $description, $city, date("Y-m-d H:i:s"), $employer->id]);

        if (!$result) {
            return NULL;
        }

        return $statement->insert_id;
    }
}
