<?php

namespace Handlers\Employee;

use function Handlers\is_logged_in;
use Database\Repositories\EmployeeRepository;

if (!is_logged_in()) {
    redirect_to("/");
    exit();
}

$employee_repository = new EmployeeRepository();
$employee = $employee_repository->get($_SESSION["email"]);
