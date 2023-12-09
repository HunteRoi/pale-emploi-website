<?php

namespace Handlers\Employer;

use function Handlers\is_logged_in;

if (!is_logged_in()) {
    redirect_to("/");
    exit();
}
