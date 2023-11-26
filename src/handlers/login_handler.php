<?php

namespace Handlers;

use Database\Repositories\PersonRepository;

if (is_logged_in()) {
    redirect_to("/");
    exit();
}

$error = null;

function handle_form(string $email, string $password): string
{
    $person_repository = new PersonRepository();
    $person_type = $person_repository->login($_POST["email"], md5($_POST["password"]));

    if (!$person_type) {
        return "Mot de passe incorrect";
    } else {
        $_SESSION["email"] = $_POST["email"];
        return "/";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"], $_POST["password"])) {
        $result = handle_form($_POST["email"], $_POST["password"]);

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
