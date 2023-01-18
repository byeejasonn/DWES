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

            if ($usuario['img'] != './uploads/profile/img/default.jpg') {
                @unlink($usuario['img']);
            }
            
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

        <form action="" method="POST" class="container-md bg-secondary formulario formulario--edit" enctype="multipart/form-data">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-3">
                
                <label for="img" class="align-self-center formulario__profile-pic me-0 me-sm-4 mb-3 mb-sm-0">
                    <img src="<?= $usuario['img']  ?>" alt="foto perfil" class="formulario__foto">
                    <span class="overlay"><i class="bi bi-pencil-fill"></i> Editar</span>
                </label>
                <input class="form-control formulario__input--hidden" type="file" name="img" id="img" accept="image/png, image/jpeg, image/JPEG, image/PNG">
    
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" name="usuario" id="usuario" value="<?= $usuario['nombre'] ?>" placeholder="" autofocus>
                    <label for="usuario">Nombre de usuario</label>
                </div>

            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="usuario" id="usuario" value="<?= $usuario['correo'] ?>" placeholder="" disabled>
                <label for="usuario">Correo</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control formulario__input--textarea form-control" name="descripcion" id="descripcion" placeholder=""><?= $usuario['descripcion'] ?></textarea>
                <label for="usuario">Descripción</label>
            </div>

            <input type="submit" name="submit" value="Guardar" class="btn btn-primary">
            
        </form>

    </main>
</body>
</html>