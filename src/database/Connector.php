<?php

namespace src\database;

use mysqli;
use mysqli_stmt;
use RuntimeException;

class Connector
{
    private static ?Connector $instance = null;
    private $connection;

    private function __construct()
    {
        $configuration = Configuration::getInstance();

        $this->connection = new mysqli(
            $configuration->db_host,
            $configuration->db_user,
            $configuration->db_password,
            $configuration->db_name,
            $configuration->db_port
        );

        if ($this->connection->connect_errno) {
            throw new RuntimeException('mysqli connection error: ' . $this->connection->connect_error);
        }
    }

    public static function getInstance(): ?Connector
    {
        if (Connector::$instance === null) {
            Connector::$instance = new Connector();
        }

        return Connector::$instance;
    }

    public function createStatement(string $query): mysqli_stmt
    {
        return new mysqli_stmt($this->connection, $query);
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