<?php

class UsuarioPremium extends Usuario {

    function __construct(string $nombre, string $apellidos, string $deporte) {
        parent::__construct($nombre, $apellidos, $deporte);
        $this->historicoPart = 3;
    }
    
}