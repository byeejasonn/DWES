<?php

require('../src/init.php');

$DB->ejecuta("SELECT * FROM usuarios");

$usuarios = $DB->obtenDatos();

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
            <?php foreach($usuarios as $usuario): ?>
            <div class="tarjeta">
                <div class="tarjeta__header">
                    <img src="<?= $usuario['img'] ?>" alt="" class="tarjeta__foto">
                    <span class="tarjeta__usuario"><?= $usuario['nombre'] ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>