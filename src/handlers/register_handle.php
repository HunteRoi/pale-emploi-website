<?php

namespace Handlers;

use Database\Repositories\EmployeeRepository;

if (is_logged_in()) {
    redirect_to("/");
    exit();
}

$error = null;

function handle_form(string $lastname, string $firstname, string $email, string $password, string $confirm_password): string
{
    if ($password !== $confirm_password) {
        return "Les mots de passe ne correspondent pas !";
    }
    
    $employee_repository = new EmployeeRepository();
    $result = $employee_repository->create($lastname, $firstname, $email, md5($password), NULL);
    if ($result) {
        return "/?page=login";
    } else {
        return "Une erreur est survenue lors de l\"enregistrement !";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset(
        $_POST["last_name"],
        $_POST["first_name"],
        $_POST["email"],
        $_POST["password"],
        $_POST["confirm_password"])
    ) {
        $result = handle_form($_POST["last_name"], $_POST["first_name"], $_POST["email"], $_POST["password"], $_POST["confirm_password"]);
        
        if (str_starts_with($result, "/")) {
            redirect_to($result);
        } else {
            $error = $result;
        }
    } else {
        $error = "Tous les champs sont obligatoires !";
    }
}
