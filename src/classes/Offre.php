<?php
    
    require_once "/var/www/pale-emploi-website/src/autoload.php";

    use src\database\Connector;

    class Offre
    {   
        public static function getOffres() 
        {
           
            $db = Connector::getInstance();

            $result = $db->query('
                SELECT o.titre, o.description, o.ville, o.date_publication, p.prenom
                FROM offre_emploi as o
                LEFT JOIN personne as p
                ON o.employeur_id = p.id
                WHERE p.entreprise != "";
            ');

            return $result->fetch_all();
        }
    }