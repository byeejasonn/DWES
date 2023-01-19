<?php

require('../src/init.php');

$DB = DWESBaseDatos::obtenerInstancia();

if(isset($_SESSION['usuario'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);

    $DB->ejecuta("DELETE FROM token WHERE valor = ?", $_COOKIE['recuerdame']);

    // unset($_COOKIE['recuerdame']);
    // $_COOKIE['recuerdame'] == null;
    setcookie("recuerdame", null, [
        "expires" => time() - 3600,
        // "secure" => true,
        "httponly" => true
    ]);
}

header('Location: listado.php');