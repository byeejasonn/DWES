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

    if($insertado) {
        $cuerpo = <<<EOL
            Gracias por haberte registrado $usuario en <b>Linkenin</b>.
        EOL;
        Mailer::send($correo, $usuario, $cuerpo);
    }
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
    
    <main class="main">
        <?php if (!$insertado) :?>
            <form class="formulario" method="POST" action="">
    
                <div class="formulario__contenedor">
                    <label for="passwd">Email:</label>
                    <input class="formulario__input" type="email" name="correo" id="correo" value="<?= $correo ?>" autofocus>
                </div>
    
                <div class="formulario__contenedor">
                    <label for="usuario">Usuario:</label>
                    <input class="formulario__input" type="text" name="usuario" id="usuario" value="<?= $usuario ?>">
                </div>
    
                <div class="formulario__contenedor">
                    <label for="passwd">Constraseña:</label>
                    <input class="formulario__input" type="password" name="passwd" id="passwd" value="<?= $passwd ?>">
                </div>
    
                <div class="formulario__contenedor">
                    <input class="formulario__input" type="submit" name="submit" value="Log in">
                </div>
                <!-- <a href="logout.php">Cerrar Sesión</a> -->
            </form>
        <?php else : ?>
            <h3>Usuario insertado</h3>
        <?php endif; ?>
    </main>
</body>
</html>