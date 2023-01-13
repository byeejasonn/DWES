<?php

require('../src/init.php');

if(isset($_SESSION['usuario'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);
    // unset($_COOKIE['recuerdame']);
    // $_COOKIE['recuerdame'] == null;
    setcookie("recuerdame", null, [
        "expires" => time() - 3600,
        // "secure" => true,
        "httponly" => true
    ]);
}

header('Location: listado.php');