<?php

namespace Handlers;

use Classes\PersonType;
use Database\Repositories\EmployeeRepository;
use Database\Repositories\EmployerRepository;
use Database\Repositories\PersonRepository;

spl_autoload_register(function ($class) {
    // as namespaces are case-sensitive, we need to make sure the path is correct. For
    // example, if the namespace is "Classes", the path should be "{parent directory}/classes/Person.php"
    $namespace = substr($class, 0, strrpos($class, '\\'));
    $classname = substr($class, strrpos($class, '\\') + 1);

    $path = __DIR__ . '/../' . strtolower(str_replace('\\', '/', $namespace)) . "/$classname.php";

    include_once($path);
});

session_start();

include "./utils.php";

$person = null;
$person_type = null;

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
