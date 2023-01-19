<?php

require('../src/init.php');

$DB = DWESBaseDatos::obtenerInstancia();

$insertado = false;

$correo = '';
$usuario = '';
$passwd = '';

if (isset($_POST['submit'])) {
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];

    $DB->ejecuta("INSERT INTO usuarios (nombre, passwd, correo) values (?, ?, ?)", $usuario, password_hash($passwd, PASSWORD_DEFAULT), $correo);

    $insertado = $DB->getExecuted();

    if ($insertado) {
        $asunto = 'Registro';
        $cuerpo = <<<EOL
            Gracias por haberte registrado $usuario en <b>Linkenin</b>.
        EOL;
        Mailer::send($correo, $usuario, $asunto, $cuerpo);

        header('Location: registro.php?success');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../src/head.php') ?>

</head>

<body>

    <?php require('../src/header.php') ?>

    <main class="main">

        <form class="formulario container-lg d-flex flex-column mx-auto" method="POST" action="">
            <h2 class="mb-3">Registro</h2>

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

            <input class="btn btn-primary mb-3" type="submit" name="submit" value="Log in">

            <?php if (isset($_GET['success'])) : ?>
                <div class="alert alert-success" role="alert">
                    Se ha registrado correctamente
                </div>
            <?php endif; ?>

            <!-- <a href="logout.php">Cerrar Sesión</a> -->
        </form>
    </main>
</body>

</html>