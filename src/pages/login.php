<?php include "./handlers/login_handler.php"; ?>

<div class="container">
    <h1>Connexion</h1>
    <p>Connectez-vous à Pâle Emploi !</p>
    <p>Si vous n'avez pas de compte, <a href="/?page=register">inscrivez-vous</a>.</p>
    <div>
        <form method="post">
            <fieldset>
                <legend>Informations de connexion</legend>
                <div>
                    <label for="email">Adresse email :</label>
                    <input type="email" name="email" id="email" <?php echo isset($_POST["email"]) ? "value=\"{$_POST['email']}\"" : "" ?> required />
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required />
                </div>
            </fieldset>
            <div class="error">
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
            <input type="submit" value="Se connecter sur la plateforme" />
        </form>
    </div>
</main>
