<?php

require('../src/init.php');

// alumno.falso
$DB = DWESBaseDatos::obtenerInstancia();

$DB->ejecuta("SELECT * FROM usuarios where id = ?", $_SESSION['id']);

$usuario = $DB->obtenPrimeraInstacia();

$directorio = './uploads/profile/img/';

if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    $nombre = $_FILES['img']['name'];
    $tipo = $_FILES['img']['type'];
    $rutaTemportal = $_FILES['img']['tmp_name'];

    if ($tipo == 'image/png' || $tipo == 'image/jpeg') {
        $nombreUnico = bin2hex(random_bytes(16));

        $rutaFichero = $directorio.$nombreUnico.$nombre;
        echo $rutaFichero;
        if(move_uploaded_file($rutaTemportal, $rutaFichero)) {
            echo "Fichero subido";

            $DB->ejecuta("UPDATE usuarios set img = ? where id = ?", $rutaFichero, $_SESSION['id']);

            header('Location: edit.php');
        } else {
            echo "Error al subir la imagen";
        }
    } else {
        echo "Solo se permite formato png y jpg";
    }
}


// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["img"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["img"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }

// print_r($_POST);
// print_r($_FILES);

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
            <input class="fomulario__input formulario__profile-pic" type="file" name="img" id="img" accept="image/png, image/jpeg, image/JPEG, image/PNG">

            <input type="submit" name="submit" value="Enviar" class="formulario__input">
        </form>

    </main>
</body>
</html>