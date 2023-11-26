<?php

namespace Handlers;

use Database\Repositories\PersonRepository;
use Database\Repositories\EmployerRepository;
use Database\Repositories\EmployeeRepository;
use Classes\PersonType;

spl_autoload_register(function ($class) {
    $path = str_replace("src/", "", str_replace("\\", "/", $class)) . ".php";

    include_once($path);
});

session_start();

include "./utils.php";

$person = null;

function is_logged_in(): bool 
{
    return isset($_SESSION["email"]);
}

if (is_logged_in()) {
    $person_repository = new PersonRepository();
    $person_type = $person_repository->getPersonType($_SESSION["email"]);
    
    if (!$person_type) {
        redirect_to("/?page=error&error=L'utilisateur ne correspond à aucun groupe!");
        exit();
    }
    
    if (!isset($_GET["page"])) {
        $path = "/?page=" . ($person_type === PersonType::Employee ? "employee" : "employer") . "/";
        if (str_starts_with($path, "/")) {
            redirect_to($path);
            exit();
        }
    }
    
    if ($person_type === PersonType::Employee) {
        $employee_repository = new EmployeeRepository();
        $person = $employee_repository->get($_SESSION["email"]);
    } else if ($person_type === PersonType::Employer) {
        $employer_repository = new EmployerRepository();
        $person = $employer_repository->get($_SESSION["email"]);
    }
}
