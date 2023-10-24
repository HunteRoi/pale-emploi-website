<?php

namespace src\database;

use mysqli;

include_once("Connector.php");

class Connector
{
    private $connection;

    public function __construct()
    {
        $configuration = Configuration::getInstance();

        $this->connection = new mysqli(
            $configuration->db_host,
            $configuration->db_user,
            $configuration->db_password,
            $configuration->db_database
        ) or die("Connect failed: %s\n" . $this->connection->error);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
}