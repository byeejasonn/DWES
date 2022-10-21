<?php

class Coche {
    private $matricula;
    private $marca;
    private $carga;

    public function __construct(int $matricula, string $marca, int $carga) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->carga = $carga;
    }

    public function pintarInformacion(){
        return "Coche: ".$this->matricula.", ".$this->marca." con carga ".$this->carga;
    }

    public function setMatricula(int $matricula) {
        $this->matricula = $matricula;
    }

    public function getMatricula() {
        return $this->matricula; 
    }

    public function setMarca(string $marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca; 
    }

    public function setCarga(int $carga) {
        $this->carga = $carga;
    }

    public function getCarga() {
        return $this->carga; 
    }
}