<?php

require('../src/init.php');

$DB->ejecuta("SELECT * FROM usuarios");

$usuarios = $DB->obtenDatos();

$verificado = 1;
if (isset($_SESSION['usuario'])) {
    $DB->ejecuta("SELECT * FROM usuarios WHERE id = ?", $_SESSION['id']);

    $usuario = $DB->obtenPrimeraInstancia();

    $verificado = $usuario['verificacion'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../src/head.php') ?>
</head>
<body>
    <?php require('../src/header.php'); ?>

    <main class="main">
        
        <?php if (isset($_SESSION['usuario']) && !$verificado) : ?>
            <div class="alert alert-warning" role="alert">
                Por favor verifique su cuenta, se le ha enviado un correo. <a href="verificar.php?reenviar" rel="noopener noreferrer">Reenviar correo</a>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'verify') : ?>
            <div class="alert alert-danger" role="alert">
                No se ha podido verificar su cuenta de correo.
            </div>
        <?php endif; ?>

        <h2>Listado</h2>
        
        <div class="listado">
            <?php foreach($usuarios as $usuario): ?>
            <div class="tarjeta rounded shadow mb-4">
                <div class="tarjeta__header">
                    <img src="<?= $usuario['img'] ?>" alt="" class="tarjeta__foto" draggable="false">
                    <span class="tarjeta__usuario"><?= $usuario['nombre'] ?></span>
                </div>
                <p class="tarjeta__desc"><?= $usuario['descripcion'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>