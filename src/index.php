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

            $extension = pathinfo($page, PATHINFO_EXTENSION);
            $path_to_page = "./pages/$page";

            if (empty($extension)) {
                $path_to_page .= ".php";
            }

            if (file_exists($path_to_page)) {
                if (str_ends_with($path_to_page, ".php")) {
                    include $path_to_page;
                } else {
                    redirect_to($path_to_page);
                }
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
        redirect_to("/?page=error&error=" . urlencode($e->getMessage()));
    }
    ?>
</main>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <?php
    if (isset($_GET['message'])) {
        $toast = $_GET['message'];
        echo <<<HTML
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="/assets/img/logo.jpg" class="rounded me-2" alt="Logo" width="32" height="32">
        <strong class="me-auto">Message du système</strong>
        <small>Maintenant</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fermer la pop-up"></button>
    </div>
    <div class="toast-body">
        $toast
    </div>
</div>
HTML;
    }
    ?>

</div>

<?php include "./pages/partials/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script>
    const toastElList = document.querySelectorAll('.toast')
    const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl))

    toastList.forEach(toast => toast.show())
</script>
</body>

</html>