<?php

class CuentaBancaria {

    private static $numeroCuenta = 100001;
    private $nombre;
    private $saldo;

    function cuentaBancaria(string $nombre, float $saldo = 0) {
        $this->numeroCuenta = self::$numeroCuenta++;
        $this->nombre = $nombre;
        $this->saldo = $saldo;
    }

    function ingresar(float $cantidad) {
        $this->saldo += $cantidad;
    }

    function retirar(float $cantidad) {
        $this->saldo-=$cantidad;
    }

    function saldo() {
        return $this->saldo;
    }

    function transferir($cuenta, float $cantidad) {
        $this->saldo -= $cantidad;
        $cuenta->saldo += $cantidad;
    }

    function unir($cuenta) {
        $this->saldo += $cuenta->saldo;
        $cuenta->saldo = 0;
        $cuenta->numeroCuenta = -1;
    }

    function bancaRota() {
        $this->saldo = 0;
    }

    function mostrar() {
        return "<div class='cuenta'><span class='numero__cuenta'>Datos de la cuenta: ".$this->numeroCuenta."</span><br><span class='titular'>Titular: ".$this->nombre."</span><br><span class='saldo'>Saldo: ".$this->saldo."</span></div>";
    }
}