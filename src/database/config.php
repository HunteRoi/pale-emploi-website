<?php

namespace src\database;

use src\exceptions\UnknownPropertyException;

class Configuration
{
    private readonly array $config;
    private static ?Configuration $instance = null;

    private function __construct()
    {
        $this->config = parse_ini_file('config.ini') or die("Unable to read configuration file");
    }

    public static function getInstance(): ?Configuration
    {
        if (Configuration::$instance === null) {
            Configuration::$instance = new Configuration();
        }

        return Configuration::$instance;
    }

    /**
     * @throws UnknownPropertyException if the requested property does not exist
     */
    function __get(string $name)
    {
        return match ($name) {
            'db_host', 'db_user', 'db_password', 'db_name', 'db_port', 'db_database' => $this->config[$name],
            default => throw new UnknownPropertyException(),
        };
    }
}
