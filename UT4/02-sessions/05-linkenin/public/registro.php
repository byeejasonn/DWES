<?php

require('../src/init.php');

$DB = DWESBaseDatos::obtenerInstancia();

$correo = '';
$usuario = '';
$passwd = '';

if(isset($_POST['submit'])) {
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];

    $DB->ejecuta("INSERT INTO usuarios (nombre, passwd, correo) values (?, ?, ?)", $usuario, password_hash($passwd, PASSWORD_DEFAULT), $correo);

    $insertado = $DB->getExecuted();
}


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

    <?php require('header.php') ?>
    

    <?php if (!$insertado) :?>
        <form class="formulario" method="POST" action="">

            <div class="input">
                <label for="passwd">Email:</label>
                <input type="email" name="correo" id="correo" value="<?= $correo ?>">
            </div>

            <div class="input">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" value="<?= $usuario ?>">
            </div>

            <div class="input">
                <label for="passwd">Constraseña:</label>
                <input type="password" name="passwd" id="passwd" value="<?= $passwd ?>">
            </div>

            <div class="input">
                <input type="submit" name="submit" value="Log in">
            </div>
            <!-- <a href="logout.php">Cerrar Sesión</a> -->
        </form>
    <?php else : ?>
        <h3>Usuario insertado</h3>
    <?php endif; ?>
</body>
</html>