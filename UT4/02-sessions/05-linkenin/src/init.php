<?php

require('config.php');
require('DWESBaseDatos.php');

$TITLE = "Linkenin";
$DB = DWESBaseDatos::obtenerInstancia();
$DB->inicializa(
    $CONFIG['db_name'],
    $CONFIG['db_user'],
    $CONFIG['db_pass']
);