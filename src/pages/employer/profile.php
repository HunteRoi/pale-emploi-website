<?php include "./handlers/employer/profile_handler.php" ?>

<link href="/assets/css/profile.css" rel="stylesheet">
<div class="container container-sm d-flex justify-content-center">
    <section class="container">
        <?php
        echo
            "<h2 class=\"mt-5\">$employer</h2>" .
            '<ul class="list-unstyled">' .
            "<li>$employer->email</li>" .
            (isset($employer->company) ? "<li>$employer->company</li>" : "") .
            '</ul>';
        ?>
    </section>
</div>
