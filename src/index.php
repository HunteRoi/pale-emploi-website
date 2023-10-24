<?php
    spl_autoload_register(function ($class) {
        $path = str_replace("src/", "", str_replace('\\', '/', $class)) . '.php';

        include_once($path);
    });
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
    </head>
    <body>
        <?php
            use src\database\Connector;

            $db = Connector::getInstance();

            $result = $db->query("SELECT * FROM Candidat");
            echo implode(', ', $result->fetch_all());
        ?>
    </body>
</html>