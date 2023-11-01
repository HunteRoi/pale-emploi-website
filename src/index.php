<?php
    spl_autoload_register(function ($class) {
        $path = str_replace("src/", "", str_replace('\\', '/', $class)) . '.php';

        include_once($path);
    });
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Pâle Emploi</title>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <body>
        <table>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prénom</th>
                <th>email</th>
                <th>mot de passe</th>
            </tr>
            <tr>
                <td>
                    <?php
                    use src\database\Connector;

                    $db = Connector::getInstance();

                    $result = $db->query("SELECT * FROM Candidat");
                    echo implode(
                        '</td></tr><tr>',
                        array_map(
                            function ($row) {
                                return implode(
                                    '</td><td>',
                                    array_map(
                                        function ($value) {
                                            return $value;
                                        },
                                        $row
                                    )
                                );
                            },
                            $result->fetch_all()
                        )
                    );
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>