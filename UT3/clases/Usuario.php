<?php

class Usuario {

    private $nombre;
    private $apellidos;
    private $deporte;
    private $nivel;
    private $historico;

    private const MAXNIVEL = 6;
    private const MINNIVEL = -6;

    public function __construct(string $nombre, string $apellidos, string $deporte) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->deporte = $deporte;
        $this->nivel = 0;
        $this->hitstorico = 0;

        echo "Usuario creado ".$this->nombre."<br>";
    }

    public function introducirResultado(string $resultado) {
        switch (strtolower($resultado)) {
            case 'victoria':
                if ($this->historico < 0) $this->historico = 0;
                $this->historico++;
                echo $this->nombre." gana partido<br>";
                break;
            case 'derrota':
                if ($this->historico > 0) $this->historico = 0;
                $this->historico--;
                echo $this->nombre." pierde partido<br>";
                break;
            case 'empate':
                echo $this->nombre." empata partido<br>";
                break;
        }

        if ($this->nivel < self::MAXNIVEL && $this->historico == self::MAXNIVEL) {
            $this->nivel++;
            $this->historico = 0;
            echo $this->nombre." sube a nivel ".$this->nivel."<br>";
        } elseif($this->nivel > self::MINNIVEL && $this->historico == self::MINNIVEL) {
            $this->nivel--;
            $this->historico = 0;
            echo $this->nombre." baja a nivel ".$this->nivel."<br>";
        }
    }

    public function imprimirInformacion() { 
        echo "Imprimir ".$this->nombre."<br>";
?>
    <div class="blue">
        <ul>
            <li>Nombre: <?= $this->nombre ?></li>
            <li>Apellidos: <?= $this->apellidos ?></li>
            <li>Deporte: <?= $this->deporte ?></li>
            <li>Nivel: <?= $this->nivel ?></li>
            <li>Historico: <?= $this->historico ?></li>
        </ul>
    </div>
<?php
    }
}
?>