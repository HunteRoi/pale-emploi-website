<?php include "./handlers/logout_handler.php"; ?>

<div class="container">
    <h1>Déconnexion</h1>
    <p>Vous avez été déconnecté avec succès !</p>
    <p>Vous serez redirigés vers la <a href="/">page d'accueil</a> dans un instant...</p>
</main>

<?php redirect_to("/", 5000); ?>