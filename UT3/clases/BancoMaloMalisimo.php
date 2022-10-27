<?php

class BancoMaloMalisimo implements PlataformaPago {
    function __construct() {

    }

    function estableceConexion() : bool {
        echo "conexión BancoMaloMalísimo<br>";
        return true;
    }

    function compruebaSeguridad() : bool {
        echo "conexión segura BancoMaloMalísimo<br>";
        return true;
    }

    function pagar(string $cuenta, int $cantidad) {
        echo "pago realizado BancoMaloMalísimo<br>";
    }
}