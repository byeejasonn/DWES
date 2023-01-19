<?php

require('../src/init.php');

// alumno.falso
$DB = DWESBaseDatos::obtenerInstancia();

$DB->ejecuta("SELECT * FROM usuarios where id = ?", $_SESSION['id']);

$usuario = $DB->obtenPrimeraInstacia();

$directorio = './uploads/profile/img/';

$descripcion;

if (isset($_POST['submit'])) {
    $descripcion = nl2br($_POST['descripcion']);
    $imagen = $usuario['img'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $imagen = $_FILES['img']['name'];
        $tipo = $_FILES['img']['type'];
        $tmp = $_FILES['img']['tmp_name'];
    
        if ($tipo == 'image/png' || $tipo == 'image/jpeg') {
            $imagen = $directorio.bin2hex(random_bytes(16)).$imagen;

            if(move_uploaded_file($tmp, $imagen)) {
                echo "Fichero subido";
    
                if ($usuario['img'] != './uploads/profile/img/default.jpg') {
                    @unlink($usuario['img']);
                }
                
                header('Location: edit.php');
            } else {
                echo "Error al subir la imagen";
            }
        } else {
            echo "Solo se permite formato png y jpg";
        }
    }

    $DB->ejecuta("UPDATE usuarios SET img = ?, descripcion = ? WHERE id = ?", $imagen, $descripcion, $_SESSION['id']);
}


// no deja subir una imagen de más de 2MB - resulto, se modifica en php.ini
// if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
//     $nombre = $_FILES['img']['name'];
//     $tipo = $_FILES['img']['type'];
//     $rutaTemportal = $_FILES['img']['tmp_name'];

//     if ($tipo == 'image/png' || $tipo == 'image/jpeg') {
//         $nombre = bin2hex(random_bytes(16)).$nombre;

//         $rutaFichero = $directorio.$nombre;
//         echo $rutaFichero;
//         if(move_uploaded_file($rutaTemportal, $rutaFichero)) {
//             echo "Fichero subido";

//             if ($usuario['img'] != './uploads/profile/img/default.jpg') {
//                 @unlink($usuario['img']);
//             }
            
//             $DB->ejecuta("UPDATE usuarios set img = ? where id = ?", $rutaFichero, $_SESSION['id']);

//             header('Location: edit.php');
//         } else {
//             echo "Error al subir la imagen";
//         }
//     } else {
//         echo "Solo se permite formato png y jpg";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../src/head.php') ?>

</head>
<body>
    <?php require('../src/header.php') ?>

    <main class="main">
        
        <form action="edit.php" method="POST" class="container-md formulario formulario--edit" enctype="multipart/form-data">
            <h2 class="mb-3">Perfil</h2>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-3">
                
                <label for="img" class="align-self-center formulario__profile-pic me-0 me-sm-4 mb-3 mb-sm-0">
                    <img src="<?= $usuario['img']  ?>" alt="foto perfil" class="formulario__foto">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <span><i class="bi bi-pencil-fill align-bottom"></i> Editar</span>
                    </div>
                </label>
                <input class="form-control formulario__input--hidden" type="file" name="img" id="img" accept="image/png, image/jpeg, image/JPEG, image/PNG">
    
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>" placeholder="" disabled>
                    <label for="nombre">Nombre de usuario</label>
                </div>

            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="usuario" id="usuario" value="<?= $usuario['correo'] ?>" placeholder="" disabled>
                <label for="usuario">Correo</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="descripcion" id="descripcion" placeholder=""><?=  br2nl($descripcion ?? $usuario['descripcion']) ?></textarea>
                <label for="usuario">Descripción</label>
            </div>

            <input type="submit" name="submit" value="Guardar" class="btn btn-primary">
            
        </form>

    </main>
</body>
</html>