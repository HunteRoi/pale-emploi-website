<?php include "./handlers/employer/job_offer/upload_handler.php"; ?>

<div class="container">
    <h1>Uploader une offre d'emploi</h1>
    <p>
        <a href="/?page=employer/job_offer/">Retour à la liste des offres d'emploi</a>
    </p>
    <form method="post" enctype="multipart/form-data">
        <div class="input-group mb-3 flex-nowrap">
            <label for="title" class="required input-group-text">Titre de l'offre d'emploi</label>
            <input class="form-control" type="text" name="title" id="title" required/>
        </div>
        <div class="input-group mb-3 flex-nowrap">
            <label for="description" class="input-group-text">Description de l'offre d'emploi</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="input-group mb-3 flex-nowrap">
            <label for="city" class="input-group-text">Ville</label>
            <input class="form-control" type="text" name="city" id="city"/>
        </div>
        <div class="mb-3">
            <label for="file" class="mb-1 required">Fichier complémentaire à uploader :</label>
            <div class="input-group flex-nowrap">
                <input class="form-control" type="file" name="file" id="file" required/>
            </div>
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
        <?php endif; ?>
        <input class="btn btn-primary" type="submit" value="Uploader" id="submit-button"/>
    </form>

    <script>
        $("#file").on("change", function () {
            const file = $(this).prop("files")[0];
            const fileName = file.name;

            if (!fileName.endsWith(".pdf")) {
                alert("Le fichier doit être au format PDF");
                $(this).val("");
            }
        });
    </script>
</div>
