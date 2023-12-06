<?php include "./handlers/index.php" ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pâle Emploi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        main > .container {
            padding: 100px 15px 0;
        }

        :root {
            --bs-dark-rgb: 0, 0, 0;
        }
    </style>
</head>

<body class="d-flex flex-column vh-100 bg-light">
<?php include "./pages/partials/header.php"; ?>
<main class="flex-shrink-0">
    <?php
    try {
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            if (str_ends_with($page, "/")) {
                $page .= "index";
            }
            $path_to_page = "./pages/$page.php";
            if (file_exists($path_to_page)) {
                include $path_to_page;
            } else {
                include "./pages/404.php";
            }
        } else {
            echo "<div class=\"container text-center\">
                    <h2>Bienvenue sur Pâle Emploi!</h2>
                    <div>
                        <p>Si vous avez déjà un compte, <a href=\"/?page=login\">connectez-vous</a>.</p>
                        <p>Si vous n'avez pas de compte, <a href=\"/?page=register\">inscrivez-vous</a>.</p>
                    </div>
                    <img src=\"/assets/img/logo.jpg\" alt=\"logo\" width=\"300\" />
                </div>";
        }
    } catch (Exception $e) {
        redirect_to("/?page=error&error=" . $e->getMessage());
    }
    ?>
</main>
<?php include "./pages/partials/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>