<?php

namespace Handlers\Employee;

use Classes\PersonType;
use Database\Repositories\EmployeeRepository;
use function Handlers\is_logged_in;

if (!is_logged_in()) {
    redirect_to("/");
    exit();
}

if ($person_type === PersonType::Employer) {
    redirect_to("/?page=employer/profile");
    exit();
}

$employee_repository = new EmployeeRepository();
$employee = $employee_repository->get($_SESSION["email"]);
