<?php include "./handlers/employer/job_offer/index_handler.php"; ?>

<div class="container">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php endif; ?>

    <?php if (isset($offer)): ?>
        <h1 class="text-center">Offre d'emploi</h1>
        <h2 class="text-center"><?php echo $offer->title ?></h2>
        <h3 class="text-center"><?php echo $offer->city ?></h3>
        <p class="text-center"><?php echo $offer->description ?></p>
        <p class="text-center">Publié par <?php echo $offer->employer ?>
            le <?php echo $offer->getPublicationDate() ?></p>

        <a class="btn btn-primary" href="<?php echo $offer->filepath ?>" target="_blank">Consulter</a>
    <?php else: ?>
        <?php if (isset($offers)): ?>
            <section>
                <h1 class="text-center">Offres d'emploi</h1>
                <div class="d-flex flex-column flew-wrap align-content-center justify-content-between">
                    <?php
                    foreach ($offers as $offer) {
                        $subtitle = "";
                        if ($offer->publication_date != null) $subtitle .= $offer->getPublicationDate('D, d M Y');
                        if ($subtitle != "" && $offer->city != null) $subtitle .= " - ";
                        if ($offer->city != null) $subtitle .= "$offer->city";

                        $body_text = "";
                        if ($offer->description != null) $body_text .= $offer->description;

                        echo "<div class=\"card mb-3\">
                        <div class=\"card-header\">Publié par $offer->employer</div>
                        <div class=\"card-body\">
                            <h4 class=\"card-title\">$offer->title</h3>
                            <h6 class=\"card-subtitle\">$subtitle</h5>
                            <p class=\"card-text mt-3\">$body_text</p>
                            <a href=\"?page=employer/job_offer/&id=$offer->id\" class=\"btn btn-primary\">Consulter</a>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
</div>
