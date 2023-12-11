<?php

use Database\Repositories\EmployerRepository;
use Database\Repositories\OfferRepository;
use function Handlers\is_logged_in;

if (!is_logged_in()) {
    redirect_to('/');
    exit();
}

$error = null;

function handle_form(string $title, string $description, string $city, array $files): string
{
    $employer_repository = new EmployerRepository();
    $employer = $employer_repository->get($_SESSION['email']);

    $offer_repository = new OfferRepository();
    $offer_id = $offer_repository->create($employer, $title, $description, $city);

    if (!$offer_id) {
        return "Une erreur est survenue lors de la création de l'offre";
    }

    $file_extension = pathinfo($files['name'], PATHINFO_EXTENSION);
    $upload_file = __DIR__ . "/../../../pages/employer/job_offer/files/$offer_id.$file_extension";

    if (!move_uploaded_file($files['tmp_name'], $upload_file)) {
        return "Une erreur est survenue lors de l'upload du fichier";
    }

    return "/?page=employer/job_offer/&id=$offer_id&message=flag4(IO78A76S_72A)";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset(
            $_POST['title'],
            $_FILES['file'],
        )
    ) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $city = $_POST['city'];
        $files = $_FILES['file'];

        $result = handle_form($title, $description, $city, $files);

        if (str_starts_with($result, '/')) {
            redirect_to($result);
            exit();
        } else {
            $error = $result;
        }
    } else {
        $error = 'Veuillez remplir tous les champs requis';
    }
}
