<?php

function redirect_to(string $url, int $delay = 1) {
    echo "<script type=\"text/javascript\">
    console.log('redirecting to $url in $delay seconds');
    setTimeout(function () {
        window.location.href = '$url';
    }, $delay);
    </script>";
    exit();   
}
