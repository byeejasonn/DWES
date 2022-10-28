<?php
namespace Juego;

trait Descripcion {
    private $descripcion;

    function setDescripcion(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }
}