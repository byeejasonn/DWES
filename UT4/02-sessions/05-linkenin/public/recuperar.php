<?php

require('../src/init.php');

$DB = DWESBaseDatos::obtenerInstancia();

// print_r($_SESSION);

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

$recuperar = false;
if (isset($_GET['t'])) {
    $recuperar = true;

    $DB->ejecuta("SELECT * FROM token WHERE valor = ? and tipo = ?", $_GET['t'], TOKEN_RECOVER_PASSWD);

    $token = $DB->obtenPrimeraInstacia();

    if (isset($_POST['new_passwd']) && !empty($token)) {
        $DB->ejecuta("UPDATE usuarios set passwd = ? WHERE id = ?", password_hash($_POST['passwd'], PASSWORD_DEFAULT), $token['id_usuario']);

        $DB->ejecuta("DELETE FROM token where id = ?", $token['id']);

        header('Location: listado.php');
    }
}

if (isset($_POST['enviar'])) {
    $DB->ejecuta("SELECT * FROM usuarios WHERE correo = ?", $_POST['correo']);

    $usuario = $DB->obtenPrimeraInstacia();

    if (!empty($usuario)) {
        $token = getToken();

        $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo, expiracion) VALUES (?, ?, ?, NOW() + INTERVAL ? MINUTE)", $usuario['id'], $token, TOKEN_RECOVER_PASSWD, TIME_TOKEN_PASSWD);

        $asunto = 'Linkenin - Recuperar contraseña';
        // cambiar estilos, ver como poner estilos en correo
        $cuerpo = <<<EOL
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <style>
                .wrapper {
                    width: 100%;
                    background-color: gray;
                }
        
                .main {
                    width: 80%;
                    background-color: white;
                }
            </style>
        </head>
        <body>
            <div class="wrapper">
                <main class="main">
        
                    <h2>Recuperar contraseña</h2>
        
                    <p>Para poder restablecer la contraseña de tu cuenta haz click en el siguiente enlace y estable la nueva con la que te vas a identificar en la plataforma</p>
                    <small class="text-muted">Una vez se cambie no podrá usar más este enlace o después de media hora tras recibir el correo</small>
        
                    <a href="http://localhost:8000/recuperar.php?t={$token}" class="btn btn-primary">Restablecer contraseña</a>
        
                </main>
            </div>
        </body>
        </html>
        EOL;

        Mailer::send($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);

        header('Location: listado.php');
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
        
        <form action="" method="POST" class="formulario container-lg d-flex flex-column mx-auto">
            <h2 class="mb-3">Recuperar contraseña</h2>

            <?php if (!$recuperar) : ?>

                <div class="form-floating mb-3">
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="" required>
                    <label for="correo">Correo:</label>
                    <div class="form-text">Correo al que se le enviará los pasos a seguir para cambiar la contraseña</div>
                </div>

                <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">

            <?php else : ?>

                <div class="form-floating mb-3">
                    <input type="password" name="passwd" id="passwd" class="form-control" placeholder="" required>
                    <label for="correo">Contraseña:</label>
                    <div class="form-text">Contraseña nueva</div>
                </div>

            <?php endif; ?>

        </form>

    </main>

</body>
</html>