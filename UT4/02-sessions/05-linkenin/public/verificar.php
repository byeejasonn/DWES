<?php

require '../src/init.php';

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
    exit();
}

if (isset($_GET['t'])) {
    
    $DB = DWESBaseDatos::obtenerInstancia();

    $DB->ejecuta("SELECT * FROM token WHERE valor = ? AND tipo = 3", $_GET['t']);

    $token = $DB->obtenPrimeraInstacia();

    if (!empty($token)) {
        $DB->ejecuta("UPDATE usuarios SET verificacion = 1 WHERE id = ?", $token['id_usuario']);

        header('Location: listado.php');
        exit();
    }

}

header('Location: listado.php');
exit();