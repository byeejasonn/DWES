<?php

require('../src/init.php');

// recoger datos post
// consulta a base de datos por el usuario
// verificar contraseña

// Si ha pedido recuerdame
//  generar token
//  guardar token
//  cookie con token

define("LONG_TOKEN", 32);

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

$DB = DWESBaseDatos::obtenerInstancia();

$usuario = '';
$passwd = '';

if(isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];
    $recuerdame = $_POST['recuerdame'];

    $DB->ejecuta("SELECT * FROM usuarios WHERE nombre = ?", $usuario);

    // solo quiero la primera instancia
    $data = $DB->obtenPrimeraInstacia();

    print_r($data);
    
    if(!empty($data) && password_verify($passwd,$data['passwd'])) {
        $_SESSION['usuario'] = $data['nombre'];
        $_SESSION['id'] = $data['id'];

        if(isset($recuerdame) && $recuerdame == 'on') {
            $DB->ejecuta("SELECT * FROM token WHERE id_usuario = ?", $_SESSION['id']);

            $token = $DB->obtenPrimeraInstacia();

            if (empty($token)) {
                $token = bin2hex(openssl_random_pseudo_bytes(LONG_TOKEN));
    
                $DB->ejecuta("INSERT INTO token (id_usuario, valor) VALUES (?, ?)", $_SESSION['id'], $token);
            } else {
                $token = $token['valor'];
            }

            // setcookie("hola", "hola");
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
        <form class="formulario" method="POST" action="">
            <div class="formulario__contenedor">
                <label for="usuario">Usuario:</label>
                <input class="formulario__input" type="text" name="usuario" id="usuario" value="<?= $usuario ?>" autofocus>
            </div>
    
            <div class="formulario__contenedor">
                <label for="passwd">Constraseña:</label>
                <input class="formulario__input" type="password" name="passwd" id="passwd" value="<?= $passwd ?>">
            </div>

            <div class="formulario__contenedor formulario__contenedor--row">
                <input class="formulario__input formulario__checkbox" type="checkbox" name="recuerdame" id="recuerdame">
                <label for="recuerdame">Recuerdame</label>
            </div>
    
            <div class="formulario__contenedor">
                <input class="formulario__input" type="submit" name="submit" value="Log in">
            </div>
            <!-- <a href="logout.php">Cerrar Sesión</a> -->
        </form>
    </main>
    
</body>
</html>