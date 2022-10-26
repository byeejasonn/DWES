<?php

abstract class Mago implements Personaje {

    use Posicion;

    function defender() {
        echo "hechizo protector<br>";
    }

    abstract function atacar();

}