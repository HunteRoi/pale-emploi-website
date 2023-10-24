<?php

namespace src\database;

use mysqli;
use RuntimeException;

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
        );

        if ($this->connection->connect_errno) {
            throw new RuntimeException('mysqli connection error: ' . $this->connection->connect_error);
        }
    }

    public function query(string $query)
    {
        return $this->connection->query($query);
    }

    public function close()
    {
        $this->connection->close();
    }
}