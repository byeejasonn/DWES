<?php

class Tabla {
    private const FILAS = 9;
    private const PISTAS = 17;

    function __construct() {

    }

    function pintarTabla() {
        for ($i=0; $i < self::FILAS; $i++) :
?>
        <div class = "fila fila<?= $i ?>">
<?php
            for ($j=0; $j < self::FILAS; $j++) :
?>
                <div class = "cuadrado cuadrado<?=$i."-".$j?>"></div>
<?php
            endfor;
?>
        </div>
<?php
        endfor;
    }
}