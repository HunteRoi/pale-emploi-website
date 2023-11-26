<?php

namespace Database\Repositories;

use Database\Connector;
use Classes\Employer;
use Classes\Offer;

class OfferRepository
{
    private Connector $connector;
    
    public function __construct()
    {
        $this->connector = Connector::getInstance();
    }
    
    public function get(): ?array
    {
        $rows = $this->connector->query(
            "SELECT o.titre, o.description, o.ville, o.date_publication, 
            p.nom, p.prenom, p.email, p.mot_de_passe, p.entreprise, p.code_parrainage
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
                $result[0], $result[1], $result[2], isset($result[3]) ? new \DateTimeImmutable($result[3]) : $result[3],
                new Employer($result[4], $result[5], $result[6], $result[7], $result[8], $result[9])
            );
        }
        return $offers;
    }
}
