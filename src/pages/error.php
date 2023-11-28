<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Oups!</h1>
            <h2>Une erreur est survenue!</h2>
            <h3>
                <?php echo htmlspecialchars($_GET["error"]); ?>
            </h3>
            Retourner à la <a href="/">page d'Accueil</a>
        </div>
    </div>
</div>
