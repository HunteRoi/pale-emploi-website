<?php include "./handlers/employee/sponsorship_handler.php"; ?>

<div class="container">
    <h1>Enregistrement du code de parrainage</h1>
    <p>Vous souhaitez avoir accès aux fonctionnalités de recruteur ?</p>
    <p>Alors remplissez le formulaire ci-dessous sans attendre !</p>
    <div>
        <form method="post">
            <fieldset>
                <legend>Enregistrement du code de parrainage</legend>
                <div>
                    <label for="sponsor_code">Code de parrainage à 6 chiffres :</label>
                    <input type="text" name="sponsor_code" id="sponsor_code" pattern="[0-9]{6}" required/>
                </div>
                <div>
                    <label for="company_name">Nom de l'entreprise :</label>
                    <input type="text" name="company_name" id="company_name" required/>
            </fieldset>
            <div class="error">
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
            <input type="submit" value="S'enregistrer comme employeur"/>
        </form>
    </div>
    <script>
        document.getElementById("sponsor_code").addEventListener("input", function (e) {
            e.target.setCustomValidity(
                e.target.validity.patternMismatch
                    ? "Le code de parrainage doit être composé de 6 chiffres!"
                    : ""
            )
        });
    </script>
</div>
