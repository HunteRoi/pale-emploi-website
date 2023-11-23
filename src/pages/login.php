<?php

## AFFICHE LA PAGE DE LOGIN (formulaire de connexion)

session_start();

if(isset($_SESSION['email'])) {
    header('Location: /pages/employee/index.php');
    exit();
}

include_once "../autoload.php";

use src\database\Connector;

$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset(
            $_POST['email'],
            $_POST['password']
        )
    ) {
            $db_connection = Connector::getInstance();
            $statement = $db_connection->createStatement("SELECT mot_de_passe FROM personne WHERE email=?");
            $result = $statement->execute(
                [
                    $_POST['email']
                ]
            );
            if (!$result) {
                $error = 'Une erreur est survenue lors de la connexion !';
            } else {
                $hashed_password_from_db = $statement->fetch();

                if (md5($_POST['password']) == $hashed_password_from_db) {
                    $_SESSION['email'] = $_POST['email']; // Stocke l'email en session
                    header('Location: /pages/employee/index.php'); 
                    exit();
                } else {
                    $error = 'Mot de passe incorrect';
                }
            }   

    } else {
        $error = 'Tous les champs sont obligatoires !';
    }
}
?>

<?php include_once('templates/header.php'); ?>

<h1>Connexion</h1>

<p>Connectez-vous à Pâle Emploi  !</p>
<p>Si vous n'avez pas de un compte, <a href="/pages/register.php">inscrivez-vous</a>.</p>

<div>
    <form method="post">
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
        </fieldset>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
        <input type="submit" value="Se connecter sur la plateforme">
    </form>
</div>

<?php include_once('templates/footer.php'); ?>
