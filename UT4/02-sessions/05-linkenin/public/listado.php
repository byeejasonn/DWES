<?php

require('../src/init.php');

$DB->ejecuta("SELECT * FROM usuarios");

$usuarios = $DB->obtenDatos();

// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../src/head.php') ?>
</head>
<body>
    <?php require('../src/header.php'); ?>

    <main class="main">
        <h2>Hola mundo</h2>
        
        <div class="listado">
            <?php foreach($usuarios as $usuario): ?>
            <div class="tarjeta">
                <div class="tarjeta__header">
                    <img src="<?= $usuario['img'] ?>" alt="" class="tarjeta__foto">
                    <span class="tarjeta__usuario"><?= $usuario['nombre'] ?></span>
                </div>
                <p class="tarjeta__desc"><?= $usuario['descripcion'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>