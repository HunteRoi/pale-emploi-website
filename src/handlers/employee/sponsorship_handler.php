<?php

namespace Handlers\Employee;

use Database\Repositories\EmployeeRepository;
use Database\Repositories\SponsorCodeRepository;
use function Handlers\is_logged_in;

if (!is_logged_in()) {
    redirect_to('/');
    exit();
}

$error = '';

function handle_form(string $sponsor_code, string $company_name): string
{
    $employee_repository = new EmployeeRepository();
    $employee = $employee_repository->get($_SESSION['email']);

    $sponsor_code_repository = new SponsorCodeRepository();
    $sponsor_code_regex = "/[0-9]{6}/";
    $FLAG = 'flag2(2ACK_SYS84EM)';

    if (!preg_match($sponsor_code_regex, $sponsor_code)) {
        return "Le code de parrainage que vous avez rentré n'est pas valide ! $FLAG";
    }

    $code_id = $sponsor_code_repository->getByCode($sponsor_code);

    if (!$code_id) {
        return "Le code de parrainage que vous avez rentré n'existe pas ! $FLAG";
    }

    if (
        $employee_repository->registerAsEmployer($employee->email, $code_id, $company_name)
        && $sponsor_code_repository->updateAffiliationDate($code_id)
    ) {
        return '/';
    }

    return 'Une erreur est survenue !';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sponsor_code'], $_POST['company_name'])) {
        $result = handle_form($_POST["sponsor_code"], $_POST["company_name"]);

        if (str_starts_with($result, "/")) {
            redirect_to($result);
            exit();
        } else {
            $error = $result;
        }
    } else {
        $error = "Tous les champs sont obligatoires !";
    }
}
