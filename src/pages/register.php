<?php include "./handlers/register_handle.php"; ?>

<div class="container">
    <h1>Inscription</h1>
    <p>Vous n'avez pas encore de compte ? Inscrivez-vous dès maintenant !</p>
    <p>Si vous avez déjà un compte, <a href="/?page=login">connectez-vous</a>.</p>

    <div>
        <form method="post">
            <fieldset>
                <legend>Informations personnelles</legend>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="last_name">Nom de famille</label>
                    <input class="form-control" type="text" name="last_name"
                           id="last_name" <?php echo isset($_POST["last_name"]) ? "value=\"{$_POST['last_name']}\"" : "" ?>
                           required>
                </div>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="first_name">Prénom</label>
                    <input class="form-control" type="text" name="first_name"
                           id="first_name" <?php echo isset($_POST["first_name"]) ? "value=\"{$_POST['first_name']}\"" : "" ?>
                           required>
                </div>
            </fieldset>
            <fieldset>
                <legend>Informations de connexion</legend>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="email">Adresse email</label>
                    <input class="form-control" type="email" name="email"
                           id="email" <?php echo isset($_POST["email"]) ? "value=\"{$_POST['email']}\"" : "" ?>
                           required>
                </div>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="password">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="confirm_password">Confirmation du mot de passe</label>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
                </div>
            </fieldset>
            <div class="alert alert-danger" role="alert">
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
            <input class="btn btn-primary" type="submit" value="S'inscrire sur la plateforme">
        </form>
    </div>
</div>
