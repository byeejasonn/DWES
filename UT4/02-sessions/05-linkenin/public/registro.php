<?php

require('../src/init.php');

$DB = DWESBaseDatos::obtenerInstancia();

$insertado = false;

$correo = '';
$nombre = '';
$passwd = '';

if (isset($_POST['submit'])) {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $passwd = $_POST['passwd'];

    $DB->ejecuta("INSERT INTO usuarios (nombre, passwd, correo) values (?, ?, ?)", $nombre, password_hash($passwd, PASSWORD_DEFAULT), $correo);

    $insertado = $DB->getExecuted();

    if ($insertado) {
        $DB->ejecuta("SELECT * FROM usuarios WHERE correo = ?", $correo);
        $usuario = $DB->obtenPrimeraInstacia();

        $token = getToken();

        $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo) VALUES (?, ?, ?)", $usuario['id'], $token, TOKEN_VERIFY);

        $asunto = 'Registro';
        $cuerpo = <<<EOL
        <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="x-apple-disable-message-reformatting">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <style>
                table, td, div, h1, p {font-family: Arial, sans-serif;}
                table, td {border:2px solid #000000 !important;}
            </style>
        </head>
        <body style="margin: 0; padding: 0;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                <tr>
                    <td align="center" style="padding: 0;">
                        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                            <tr>
                                <td align="center" style="padding: 40px 0;">
                                    <h2>Linkenin</h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 30px 20px;">
                                    <p align="left">Pulse el siguiente botón para verificar su cuenta en nuestra plataforma.</p>

                                    <a href="http://localhost:8000/verificar.php?t={$token}" class="btn btn-primary">Verificar correo</a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 30px 20px;">
                                    <small class="text-muted">Una vez verifique su correo no podrá usar más este enlace.</small>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        EOL;
        Mailer::send($correo, $nombre, $asunto, $cuerpo);

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
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="">
                <label for="nombre">Nombre:</label>
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