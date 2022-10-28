<?php

class Tabla {
    private const FILAS = 9;
    private const PISTAS = 17;

    function __construct() {
        $this->pintarTabla();
    }

    function pintarTabla() {
        for ($i=0; $i < self::FILAS; $i++) :
?>
        <div class = "fila fila<?= $i ?>">
<?php
            for ($j=0; $j < self::FILAS; $j++) :
                if ($j == 2 || $j == 5) {
                    $clase = 'limite-v';
                } else if  ($i == 2 || $i == 5) {
                    $clase = 'limite-h';
                } else {
                    $clase = '';
                }
?>
                <div class = "cuadrado cuadrado<?= "$i-$j $clase" ?>"><?=$i."-".$j?></div>
<?php
            endfor;
?>
        </div>
<?php
        endfor;
    }

    
}