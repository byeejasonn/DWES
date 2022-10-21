<?php

class Usuario {

    private $nombre;
    private $apellidos;
    private $deporte;
    private $nivel;
    private $historico;

    private const MAXNIVEL = 6;

    public function __construct(string $nombre, string $apellidos, string $deporte) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->deporte = $deporte;
        $this->nivel = 0;
        $this->hitstorico = 0;
    }

    public function introducirResultado(string $resultado) {
        switch (strtolower($resultado)) {
            case 'victoria':
                if ($this->historico < 0) $this->historico = 0;
                $this->historico++;
                break;
            case 'derrota':
                if ($this->historico > 0) $this->historico = 0;
                $this->historico--;
                break;
            case 'empate':
                break;
        }

        if ($this->nivel < MAXNIVEL && $this->historico == MAXNIVEL) {
            $this->nivel++;
            echo $this->nombre." sube de nivel";
        } elseif($this->nivel > 0 && $this->historico == MAXNIVEL*-1) {
            $this->nivel--;
            $this->nombre." baja de nivel";
        }
    }

    public function imprimirInformacion() {
        
    }

}