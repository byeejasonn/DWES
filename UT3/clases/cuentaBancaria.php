<?php

class CuentaBancaria {

    private $numeroCuenta = 1000;

    function cuentaBancaria(string $nombre, float $saldo = 0) {
        $this->numeroCuenta += 1;
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

    function transferir(int $cuenta, float $cantidad) {
        $this->saldo -= $cantidad;
        $cuenta->saldo += $cantidad;
    }

    function unir(int $cuenta) {
        $this->saldo += $cuenta->saldo;
        $cuenta->saldo = 0;
        $cuenta->numeroCuenta = -1;
    }

    function bamcaRota() {
        $this->saldo = 0;
    }

    function mostrar() {
        return "<p><span class='nombre'>".$this->nombre."</span>, saldo <span class='saldo'>".$this->saldo."</span></p>";
    }
}