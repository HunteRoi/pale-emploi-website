<?php

## AFFICHE LA PAGE DE LOGIN (formulaire de connexion)

include_once "../autoload.php";

use src\database\Connector;

session_start();
$error = null;

function redirection(string|null $sponsor_code): void
{
    $target_type = $sponsor_code === null ? 'employee' : 'employer';
    header("Location: /pages/$target_type/index.php");
}

if (isset($_SESSION['email'])) {
    $db_connection_redirection = Connector::getInstance();
    $statement = $db_connection_redirection->createStatement("SELECT code_parrainage FROM personne WHERE email=?");
    $result = $statement->execute([$_SESSION['email']]);

    if (!$result) {
        $error = 'Une erreur est survenue lors de la connexion !';
    } else {
        [$sponsor_code] = $statement->get_result()->fetch_row();
        redirection($sponsor_code);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $db_connection = Connector::getInstance();
        $statement = $db_connection->createStatement("SELECT email, code_parrainage FROM personne WHERE email=? and mot_de_passe=?");
        $result = $statement->execute([$_POST['email'], md5($_POST['password'])]);

        if (!$result) {
            $error = 'Une erreur est survenue lors de la connexion à la base de données ! Veuillez réessayer plus tard.';
        } else {
            $fetched_data = $statement->get_result()->fetch_row();

            if (!isset($fetched_data)) {
                $error = 'Mot de passe incorrect';
            } else {
                [$email, $sponsor_code] = $fetched_data;

                $_SESSION['email'] = $_POST['email'];
                redirection($sponsor_code);
                exit();
            }
        }
    } else {
        $error = 'Tous les champs sont obligatoires !';
    }
}
?>

<?php include_once('templates/header.php'); ?>

<h1>Connexion</h1>

<p>Connectez-vous à Pâle Emploi !</p>
<p>Si vous n'avez pas de compte, <a href="/pages/register.php">inscrivez-vous</a>.</p>

<div>
    <form method="post">
        <fieldset>
            <legend>Informations de connexion</legend>
            <div>
                <label for="email">Adresse email :</label>
                <input type="email" name="email"
                       id="email" <?php echo isset($_POST['email']) ? "value=\"{$_POST['email']}\"" : '' ?> required/>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required/>
            </div>
        </fieldset>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
        <input type="submit" value="Se connecter sur la plateforme"/>
    </form>
</div>

<?php include_once('templates/footer.php'); ?>
