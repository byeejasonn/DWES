<?php

class CocheConRemolque extends Coche {
    private $capacidadRemolque;

    public function __construct(int $matricula, string $marca, int $carga, int $capacidadRemolque) {
        parent::__construct($matricula, $marca, $carga);
        $this->capacidadRemolque = $capacidadRemolque;
    }

    public function setCapacidadRemolque($capacidadRemolque) {
        $this->capacidadRemolque = $capacidadRemolque;
    }

    public function getCapacidadRemolque() {
        return $this->capacidadRemolque;
    }

    public function pintarInformacion() {
        return parent::pintarInformacion()." y remolque de ".$this->capacidadRemolque;
    }
}