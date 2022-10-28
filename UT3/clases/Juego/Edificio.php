<?php
namespace Juego;

class Edificio {

    use Descripcion;
    use Posicion;

    private $altura;

    function setAltura(float $altura) {
        $this->altura = $altura;
    }

    function getAltura() {
        return $this->altura;
    }
}