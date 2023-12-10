<?php include "./handlers/login_handler.php"; ?>

<div class="container">
    <h1>Connexion</h1>
    <p>Connectez-vous à Pâle Emploi !</p>
    <p>Si vous n'avez pas de compte, <a href="/?page=register">inscrivez-vous</a>.</p>
    <div>
        <form method="post">
            <fieldset>
                <legend>Informations de connexion</legend>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="email">Adresse email</label>
                    <input class="form-control" type="email" name="email"
                           id="email" <?php echo isset($_POST["email"]) ? "value=\"{$_POST['email']}\"" : "" ?>
                           required/>
                </div>
                <div class="input-group mb-3 flex-nowrap">
                    <label class="input-group-text" for="password">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password" required/>
                </div>
            </fieldset>
            <div class="error">
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
            <input class="btn btn-primary" type="submit" value="Se connecter sur la plateforme"/>
        </form>
    </div>
</div>
