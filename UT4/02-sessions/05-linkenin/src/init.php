<?php

session_start();
require('config.php');
require('DWESBaseDatos.php');

$TITLE = "Linkenin";
$DB = DWESBaseDatos::obtenerInstancia();
$DB->inicializa(
    $_ENV['DN_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);