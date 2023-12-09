<?php

namespace Handlers\Employer;

use function Handlers\is_logged_in;
use Database\Repositories\EmployerRepository;

if (!is_logged_in()) {
    redirect_to("/");
    exit();
}

$employer_repository = new EmployerRepository();
$employer = $employer_repository->get($_SESSION["email"]);
