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

    $data = $sponsor_code_repository->getSponsorIdByCode($sponsor_code);

    if (empty($data)) {
        return "Le code de parrainage que vous avez rentré n'existe pas ! flag2(2ACK_SYS84EM)";
    }

    if (count($data) > 1) {
        return json_encode($data);
    } else {
        $code_id = $data[0][0];

        if (
            $employee_repository->registerAsEmployer($employee->email, $code_id, $company_name)
            && $sponsor_code_repository->updateAffiliationDate($code_id)
        ) {
            return '/';
        }
    }
    return 'Une erreur est survenue !';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sponsor_code'], $_POST['company_name'])) {
        $result = handle_form($_POST['sponsor_code'], $_POST['company_name']);

        if (str_starts_with($result, '/')) {
            redirect_to($result);
            exit();
        } else {
            $error = $result;
        }
    } else {
        $error = 'Tous les champs sont obligatoires !';
    }
}
