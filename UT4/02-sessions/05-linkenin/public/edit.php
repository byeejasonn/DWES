<?php

require('../src/init.php');

// alumno.falso
$DB = DWESBaseDatos::obtenerInstancia();

$DB->ejecuta("SELECT * FROM usuarios where id = ?", $_SESSION['id']);

$usuario = $DB->obtenPrimeraInstacia();

$directorio = './uploads/profile/img/';


// no deja subir una imagen de más de 2MB
if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    $nombre = $_FILES['img']['name'];
    $tipo = $_FILES['img']['type'];
    $rutaTemportal = $_FILES['img']['tmp_name'];

    if ($tipo == 'image/png' || $tipo == 'image/jpeg') {
        $nombre = bin2hex(random_bytes(16)).$nombre;

        $rutaFichero = $directorio.$nombre;
        echo $rutaFichero;
        if(move_uploaded_file($rutaTemportal, $rutaFichero)) {
            echo "Fichero subido";
            @unlink($usuario['img']);
            $DB->ejecuta("UPDATE usuarios set img = ? where id = ?", $rutaFichero, $_SESSION['id']);

            header('Location: edit.php');
        } else {
            echo "Error al subir la imagen";
        }
    } else {
        echo "Solo se permite formato png y jpg";
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
        <h2>Perfil</h2>

        <form action="" method="POST" class="formulario" enctype="multipart/form-data">
            <label for="img" class="formulario__profile-pic">
                <img src="<?= $usuario['img'] ?>" alt="foto perfil" class="formulario__foto">
                <span class="overlay"><i class="bi bi-pencil-fill"></i> Editar</span>
            </label>
            <input class="fomulario__input formulario__input--hidden" type="file" name="img" id="img" accept="image/png, image/jpeg, image/JPEG, image/PNG">

            <input type="submit" name="submit" value="Guardar" class="formulario__input">
        </form>

    </main>
</body>
</html>