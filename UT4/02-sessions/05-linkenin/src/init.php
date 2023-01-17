<?php

session_start();

define("DAYS_RENEW", 7);
define("TIME_TOKEN_PASSWD", 20);
define("LONG_TOKEN", 32);
define('TOKEN_SESSION', 1);
define('TOKEN_RECOVER_PASSWD', 2);


require('DWESBaseDatos.php');
require('Mailer.php');

require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$TITLE = "Linkenin";
$DB = DWESBaseDatos::obtenerInstancia();
$DB->inicializa(
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);

// print_r($_COOKIE);
// print_r($_SESSION);
// print_r($_FILES);

if(isset($_COOKIE['recuerdame']) && $_COOKIE['recuerdame'] != null) {
    $DB->ejecuta("SELECT * FROM token WHERE valor = ?", $_COOKIE['recuerdame']);
    $token = $DB->obtenPrimeraInstacia();

    if(!empty($token)) {
        $DB->ejecuta("UPDATE token set expiracion = (NOW() + INTERVAL ? DAY) WHERE id = ?", DAYS_RENEW, $token['id']);
        $DB->ejecuta("SELECT * FROM usuarios WHERE id = ?", $token['id_usuario']);

        $usuario = $DB->obtenPrimeraInstacia();

        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['id'] = $usuario['id'];
    }
}

function getToken() {
    return bin2hex(openssl_random_pseudo_bytes(LONG_TOKEN));
}