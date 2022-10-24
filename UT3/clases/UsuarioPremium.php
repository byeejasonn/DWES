<?php

class UsuarioPremium extends Usuario {

    function __construct(string $nombre, string $apellidos, string $deporte) {
        parent::__construct($nombre, $apellidos, $deporte);
        self::$historicoPart = 3;
    }

    public function imprimirInformacion() { 
        echo "Imprimir ".$this->nombre."<br>";
?>
    <div class="blue">
        <ul>
            <li>Nombre: <?= $this->nombre.' (Premium)' ?></li>
            <li>Apellidos: <?= $this->apellidos ?></li>
            <li>Deporte: <?= $this->deporte ?></li>
            <li>Nivel: <?= $this->nivel ?></li>
            <li>Historico: <?= $this->historico ?></li>
        </ul>
    </div>
<?php
    }
}