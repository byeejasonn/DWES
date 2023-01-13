<?php

require('../src/init.php');

$DB->ejecuta("SELECT * FROM usuarios");

$data = $DB->obtenDatos();

// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['TITLE'] ?></title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php require('header.php'); ?>

    <main class="main">
        <h2>Hola mundo</h2>
        <div class="listado">
            <table>
                <?php foreach($data as $fila) : ?>
                    <tr>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['correo'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
</body>
</html>