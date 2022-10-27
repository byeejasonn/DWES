<?php

class BancoMalvado implements PlataformaPago {
    function __construct() {

    }

    function estableceConexion() : bool {
        echo "conexión BancoMalvado<br>";
        return true;
    }

    function compruebaSeguridad() : bool {
        echo "conexión segura BancoMalvado<br>";
        return true;
    }

    function pagar(string $cuenta, int $cantidad) {
        echo "pago realizado BancoMalvado<br>";
    }
}