<?php

use Database\Repositories\OfferRepository;
use function Handlers\is_logged_in;

if (!is_logged_in()) {
    redirect_to('/');
    exit();
}

$offer_repository = new OfferRepository();

$offer = null;
$offers = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $offer_id = $_GET['id'];
        $offer = $offer_repository->getById($offer_id);

        if (!$offer) {
            $error = "L'offre n'existe pas";
        } else {
            $result = glob("pages/employer/job_offer/files/$offer_id.*");
            if (count($result) > 0) {
                $filepath = $result[0];
                $file_extension = pathinfo($filepath, PATHINFO_EXTENSION);
                $offer->filepath = "/pages/employer/job_offer/files/$offer_id.$file_extension";
            }

            if (!isset($offer->filepath)) {
                $error = "Le fichier n'existe pas";
            }
        }
    } else {
        $offers = $offer_repository->get();
    }
}
