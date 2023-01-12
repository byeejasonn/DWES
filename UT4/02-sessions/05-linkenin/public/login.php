<?php

require('../src/init.php');

if (isset($_SESSION['user'])) {
    header('Location: listado.php');
}

$DB = DWESBaseDatos::obtenerInstancia();

$usuario = '';
$passwd = '';

if(isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];

    $DB->ejecuta("SELECT * FROM usuarios WHERE nombre = ?", $usuario);

    // solo quiero la primera instancia
    $data = $DB->obtenPrimeraInstacia();

    print_r($data);
    
    if(!empty($data) && password_verify($passwd,$data['passwd'])) {
        $_SESSION['user'] = $data['nombre'];
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
    
    <form class="formulario" method="POST" action="">
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
</body>
</html>