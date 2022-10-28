<?php
namespace Juego;

class Humano implements Personaje {

    use Posicion;

    function atacar() {
        echo "puñetazo<br>";
    }

    function defender() {
        echo "bloqueo<br>";
    }
}