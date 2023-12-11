<?php include "./handlers/employee/sponsorship_handler.php"; ?>

<div class="container">
    <h1>Enregistrement du code de parrainage</h1>
    <p>Vous souhaitez avoir accès aux fonctionnalités de recruteur ?</p>
    <p>Alors remplissez le formulaire ci-dessous sans attendre !</p>
    <div>
        <form method="post">
            <fieldset>
                <legend>Enregistrement du code de parrainage</legend>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="sponsor_code">Code de parrainage à 6 chiffres</label>
                    <input class="form-control" type="text" name="sponsor_code" id="sponsor_code" required/>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="company_name">Nom de l'entreprise</label>
                    <input class="form-control" type="text" name="company_name" id="company_name" required/>
                </div>
            </fieldset>
            <?php if (isset($error))): ?>
                <div class="alert alert-danger" role="alert">
                    <p>
                        <?php echo $error; ?>
                    </p>
                </div>
            <?php endif; ?>
            <input type="submit" value="S'enregistrer comme employeur" class="btn btn-primary"/>
        </form>
    </div>
    <script>
        document.getElementById("sponsor_code").addEventListener("input", function (e) {
            e.target.setCustomValidity(
                e.target.value.trim() === "" ? "Le code de parrainage doit être composé de 6 chiffres!" : ""
            )
        });
    </script>
</div>
