<?php 
namespace Juego;

class Objeto {

    use Descripcion;
    use Posicion;

    private $peso;

    function setPeso(float $peso) {
        $this->peso = $peso;
    }

    function getPeso() {
        return $this->peso;
    }
}