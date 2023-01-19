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
        <h2>Recuperar contraseña</h2>

        <?php if (!$recuperar) :?>

            <form action="" method="POST" class="formulario">

                <div class="form-floating mb-3">
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="" required>
                    <label for="correo">Correo:</label>
                    <div class="form-text">Correo al que se le enviará los pasos a seguir para cambiar la contraseña</div>
                </div>

                <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
            </form>        

        <?php else: ?>

            <form action="" method="POST" class="formulario">

                <div class="form-floating mb-3">
                    <input type="password" name="passwd" id="passwd" class="form-control" placeholder="" required>
                    <label for="correo">Contraseña:</label>
                    <div class="form-text">Contraseña nueva</div>
                </div>

                <input type="submit" value="Enviar" name="new_passwd" class="btn btn-primary">
            </form>        

        <?php endif; ?>
    </main>

</body>
</html>