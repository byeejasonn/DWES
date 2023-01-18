<?php

require('../src/init.php');

// recoger datos post
// consulta a base de datos por el usuario
// verificar contraseña

// Si ha pedido recuerdame
//  generar token
//  guardar token
//  cookie con token

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

$DB = DWESBaseDatos::obtenerInstancia();

$usuario = '';
$passwd = '';

if(isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];
    $recuerdame = $_POST['recuerdame'] ?? null;

    $DB->ejecuta("SELECT * FROM usuarios WHERE nombre = ?", $usuario);

    // solo quiero la primera instancia
    $data = $DB->obtenPrimeraInstacia();

    // echo password_verify($passwd, $data['passwd']);
    // print_r($data);
    
    if(!empty($data) && password_verify($passwd,$data['passwd'])) {
        $_SESSION['usuario'] = $data['nombre'];
        $_SESSION['id'] = $data['id'];

        if(isset($recuerdame) && $recuerdame == 'on') {
            $DB->ejecuta("SELECT * FROM token WHERE id_usuario = ?", $_SESSION['id']);

            $token = $DB->obtenPrimeraInstacia();

            if (empty($token)) {
                $token = getToken();
    
                $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo) VALUES (?, ?, ?)", $_SESSION['id'], $token, TOKEN_SESSION);
            } else {
                $token = $token['valor'];
            }

            setcookie("recuerdame", $token, [
                "expires" => time() + (7 * 24 * 60 * 60),
                // "secure" => true,
                "httponly" => true
            ]);
        }

        header('Location: listado.php');
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
        <h2>Inicio de sesión</h2>

        <form class="formulario formulario--login" method="POST" action="">

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="usuario" id="usuario" value="<?= $usuario ?>" placeholder="" autofocus required>
                <label class="" for="usuario">Usuario:</label>
            </div>
    
            <div class="form-floating mb-3">
                <input class="form-control" type="password" name="passwd" id="passwd" value="<?= $passwd ?>" placeholder="" required>
                <label class="form-label" for="passwd">Constraseña:</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="recuerdame" id="recuerdame">
                <label class="form-check-label" for="recuerdame">Recuerdame</label>
            </div>

            <a href="./recuperar.php" class="mb-3">¿Has olvidado la contraseña?</a>
    
            <input class="btn btn-primary" type="submit" name="submit" value="Log in">
    
            <!-- <a href="logout.php">Cerrar Sesión</a> -->
        </form>
    </main>

</body>
</html>