<?php

require('../src/init.php');

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

$usuario = '';
$passwd = '';

if(isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];
    $recuerdame = $_POST['recuerdame'] ?? null;

    $DB->ejecuta("SELECT * FROM usuarios WHERE nombre = ?", $usuario);

    // solo quiero la primera instancia
    $data = $DB->obtenPrimeraInstancia();

    // echo password_verify($passwd, $data['passwd']);
    // print_r($data);
    
    if(!empty($data) && password_verify($passwd,$data['passwd'])) {
        $_SESSION['usuario'] = $data['nombre'];
        $_SESSION['id'] = $data['id'];

        if(isset($recuerdame) && $recuerdame == 'on') {
            // $DB->ejecuta("SELECT * FROM token WHERE id_usuario = ?", $_SESSION['id']);

            // $token = $DB->obtenPrimeraInstancia();

            // if (empty($token)) {
                $token = getToken();
    
                $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo) VALUES (?, ?, ?)", $_SESSION['id'], $token, TOKEN_SESSION);
            // } else {
            //     $token = $token['valor'];
            // }

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
    <?php require('../src/head.php') ?>
</head>
<body>

    <?php require('../src/header.php') ?>

    <main class="main">
        
        <form class="formulario container-lg d-flex flex-column mx-auto" method="POST" action="">
            <h2 class="mb-3">Inicio de sesión</h2>

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