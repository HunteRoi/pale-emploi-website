<?php

namespace Handlers\Employee;

use function Handlers\is_logged_in;
use Database\Repositories\OfferRepository;

if (!is_logged_in()) {
    redirect_to("/");
    exit();
}

$offer_repository = new OfferRepository();
$offers = $offer_repository->get();
