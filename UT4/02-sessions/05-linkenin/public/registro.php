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
        $asunto = 'Registro';
        $cuerpo = <<<EOL
            Gracias por haberte registrado $usuario en <b>Linkenin</b>.
        EOL;
        Mailer::send($correo, $usuario, $asunto, $cuerpo);
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
        <h2>Registro</h2>

        <?php if (!$insertado) :?>
            <form class="formulario formulario--registro" method="POST" action="">
    
                <div class="form-floating mb-3">
                    <input class="form-control" type="email" name="correo" id="correo" value="<?= $correo ?>" placeholder="" autofocus>
                    <label for="passwd">Email:</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="usuario" id="usuario" value="<?= $usuario ?>" placeholder="">
                    <label for="usuario">Usuario:</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input class="form-control" type="password" name="passwd" id="passwd" value="<?= $passwd ?>" placeholder="">
                    <label for="passwd">Constraseña:</label>
                </div>
    
                <input class="btn btn-primary" type="submit" name="submit" value="Log in">

                <!-- <a href="logout.php">Cerrar Sesión</a> -->
            </form>
        <?php else : ?>
            <h3>Usuario insertado</h3>
        <?php endif; ?>
    </main>
</body>
</html>