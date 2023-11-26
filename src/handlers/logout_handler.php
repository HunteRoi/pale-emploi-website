<?php

namespace Handlers;

if (!is_logged_in()) {
    redirect_to("/");
    exit();
}

session_unset();
session_destroy();
