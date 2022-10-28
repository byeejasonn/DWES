<?php 
namespace Juego;

trait Posicion {
    private $x;
    private $y;
    private $z;

    function setX(float $x) {
        $this->x = $x;
    }

    function setY(float $y) {
        $this->y = $y;
    }

    function setZ(float $z) {
        $this->z = $z;
    }

    function getX() {
        return $this->x;
    }

    function getY() {
        return $this->y;
    }

    function getZ() {
        return $this->z;
    }

    function getPosition() {
        return "X: $this->x, Y: $this->y, Z: $this->z";
    }
}