<?php

class BitCoinConan implements PlataformaPago {
    function __construct() {

    }

    function estableceConexion() : bool {
        echo "conexión BitCoinConan<br>";
        return true;
    }

    function compruebaSeguridad() : bool {
        echo "conexión segura BitCoinConan<br>";
        return true;
    }

    function pagar(string $cuenta, int $cantidad) {
        echo "pago realizado BitCoinConan<br>";
    }
}