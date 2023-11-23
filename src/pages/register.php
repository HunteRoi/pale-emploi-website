<?php

include_once "../autoload.php";

use src\database\Connector;

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset(
            $_POST['last_name'],
            $_POST['first_name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['confirm_password']
        )
    ) {
        if ($_POST['password'] === $_POST['confirm_password']) {

            $db_connection = Connector::getInstance();
            $statement = $db_connection->createStatement("INSERT INTO personne (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
            $result = $statement->execute(
                [
                    $_POST['last_name'],
                    $_POST['first_name'],
                    $_POST['email'],
                    md5($_POST['password'])
                ]
            );

            if (!$result) {
                $error = 'Une erreur est survenue lors de l\'enregistrement !';
            } else {
                header('Location: /pages/login.php');
            }
        } else {
            $error = 'Les mots de passe ne correspondent pas !';
        }
    } else {
        $error = 'Tous les champs sont obligatoires !';
    }
}
?>

<?php include_once('templates/header.php'); ?>

<h1>Inscription</h1>

<p>Vous n'avez pas encore de compte ? Inscrivez-vous dès maintenant !</p>
<p>Si vous avez déjà un compte, <a href="/pages/login.php">connectez-vous</a>.</p>

<div>
    <form method="post">
        <fieldset>
            <legend>Informations personnelles</legend>
            <div>
                <label for="last_name">Nom de famille :</label>
                <input type="text" name="last_name"
                       id="last_name" <?php echo isset($_POST['last_name']) ? "value=\"{$_POST['last_name']}\"" : '' ?>
                       required>
            </div>
            <div>
                <label for="first_name">Prénom :</label>
                <input type="text" name="first_name"
                       id="first_name" <?php echo isset($_POST['first_name']) ? "value=\"{$_POST['first_name']}\"" : '' ?>
                       required>
            </div>
        </fieldset>
        <fieldset>
            <legend>Informations de connexion</legend>
            <div>
                <label for="email">Adresse email :</label>
                <input type="email" name="email"
                       id="email" <?php echo isset($_POST['email']) ? "value=\"{$_POST['email']}\"" : '' ?> required>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirmation du mot de passe</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
        </fieldset>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
        <input type="submit" value="S'inscrire sur la plateforme">
    </form>
</div>

<?php include_once('templates/footer.php'); ?>
