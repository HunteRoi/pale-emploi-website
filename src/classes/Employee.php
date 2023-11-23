<?php

    include_once "../autoload.php";

    use src\database\Connector;

    class Employee
    {
        /**
         * @param $email
         * @return array
         */
        public static function showEmployeeInfos($email): array
        {
            $db = Connector::getInstance();

            $result = $db->query("
                SELECT *
                FROM personne as p
                WHERE p.email = '$email' AND p.entreprise IS NULL;
            ");

            return $result->fetch_all();
        }

    }

