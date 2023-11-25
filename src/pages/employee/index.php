<?php

    require_once "/var/www/pale-emploi-website/src/classes/Offre.php";

    $offres = Offre::getOffres();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee - Pale-emploi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="employee.css">
    <script src="https://kit.fontawesome.com/2a743f7cc5.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include_once('../../components/header.php');?> <!-- Import du header -->

<div class="container mb-5">
    <div id="blocHomeTextUser" class="row text-center">
        <div class="col-12 col-md-6">
            <div class="row">
                <span class="col-md-2 mr-md-1 ml-md-5 mt-5 hand-icon"><i class="fa-solid fa-hand-sparkles fa-xs"></i></span>
                <h4 class="col-md-8">Salut, NameUser<br><br> bienvenue sur ton espace personnel</h4>
            </div>
        </div>
        <div class="col">
            <div class="row mt-5 justify-content-center">
                <a href="profil.php"><button id="btnShowProfile" class="btn btn-danger">Voir mon profil</button></a> 
                <!-- <i class="fa-solid fa-right-from-bracket fa-xs">  Icône de logout-->
            </div>
        </div>
    </div>

    <div id="main-offres">
        <h2 class="text-center">Offres d'emplois</h2>
        <div class="blocHomeAnnonce row">
            <?php foreach ($offres as $offre) {

                echo 
                
                '<a class="col">
                    <div class="col bloc-textes">
                        <h3>' . $offre[0] . '</h3>
                        <p>Publier par ' . $offre[4] . '</p>
                        <p>Le ' . $offre[3] . '</p>
                        <p>Ville : ' . $offre[2] . '</p>
                        <p>Description : ' . $offre[1] . '</p>
                    </div>
                </a>';
            }  
            ?>
        </div>
    </div>
</div>

<?php include_once('../../components/footer.php'); ?> <!-- Import du footer -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
