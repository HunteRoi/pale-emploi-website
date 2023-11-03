<?php
spl_autoload_register(function ($class) {
    $path = str_replace("src/", "", str_replace('\\', '/', $class)) . '.php';

    include_once($path);
});