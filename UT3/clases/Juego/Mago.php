<?php
namespace Juego;

abstract class Mago implements Personaje {

    use Posicion;

    function defender() {
        echo "hechizo protector<br>";
    }

    abstract function atacar();

}