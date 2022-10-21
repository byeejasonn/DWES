<?php

class CocheCargado extends Coche {
    private $cocheCargado;

    public function __construct(int $matricula, string $marca, int $carga, $cocheCargado = null) {
        parent::__construct($matricula, $marca, $carga);
        $this->cocheCargado = $cocheCargado;
    }

    public function cargar(Coche $coche) {
        $this->cocheCargado = $coche;
    }

    public function descargar() {
        $this->cocheCargado = null;
    }

    public function pintarInformacion() {
        return (!is_null($this->cocheCargado))?parent::pintarInformacion()."<br>Lleva Coche: ".$this->cocheCargado->pintarInformacion():parent::pintarInformacion()."<br>No lleva ningún coche";
    }

}