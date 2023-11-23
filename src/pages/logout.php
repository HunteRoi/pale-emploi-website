<?php

session_start();
include_once "../autoload.php";

if(isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
    header("refresh:3; url=/pages/index.php"); 
}else{
    header('Location: /pages/index.php');

}
?>


<?php include_once('templates/header.php'); ?>

<h1>Déconnexion</h1>

<p>Vous avez été déconnecté avec succès !</p>
<p>Vous serez redirigés vers la <a href="/pages/index.php">page d'accueil</a> dans un instant...</p>


<?php include_once('templates/footer.php'); ?>
