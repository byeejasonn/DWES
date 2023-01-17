<?php

require('../src/init.php');

$DB = DWESBaseDatos::obtenerInstancia();

// print_r($_SESSION);

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

if(isset($_POST['enviar'])) {
    $DB->ejecuta("SELECT * FROM usuarios WHERE correo = ?", $_POST['correo']);

    $usuario = $DB->obtenPrimeraInstacia();

    if (!empty($usuario)) {
        $token = getToken();

        $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo, expiracion) VALUES (?, ?, ?, NOW() + INTERVAL ? MINUTE)",$usuario['id'], $token, TOKEN_RECOVER_PASSWD, TIME_TOKEN_PASSWD);

        $asunto = 'Linkenin - Recuperar contraseña';
        // cambiar estilos, ver como poner estilos en correo
        $cuerpo = <<<EOL
        <h3>Recuperar contraseña</h3>

        <p>Para poder reestablecer la contraseña de tu cuenta haz click en el siguiente enlace y estable la nueva con la que te vas a identificar en la plataforma</p>
        
        <a href="http://localhost:8000/recuperar.php?t={$token}" style="display: flex; width: fit-content; height: 60px; background-color: #FFCA28;align-items:center; padding: 12px;">Establecer contraseña</a>
        EOL;

        Mailer::send($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
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
    <?php require('header.php'); ?>

    <main class="main">
        <h2>Recuperar contraseña</h2>

        <form action="" method="POST" class="formulario">

            <div class="form-floating mb-3">
                <input type="text" name="correo" id="correo" class="form-control" placeholder="" required>
                <label for="correo">Correo:</label>
                <div class="form-text">Correo al que se le enviará los pasos a seguir para cambiar la contraseña</div>
            </div>

            <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
        </form>        
    </main>

    <!-- <h3>Recuperar contraseña</h3>

<p>Para poder reestablecer la contraseña de tu cuenta haz click en el siguiente enlace y estable la nueva con la que te vas a identificar en la plataforma</p>

<a href="http://localhost:8000/recuperar.php" style="display: flex; width: fit-content; height: 60px; background-color: #FFCA28;align-items:center; padding: 12px;">Establecer contraseña</a> -->
</body>
</html>