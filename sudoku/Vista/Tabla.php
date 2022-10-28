<?php

class Tabla {
    private const FILAS = 3;
    private const CUADRADOS = 9;
    private const PISTAS = 17;
    private $pistas = 0;

    function __construct() {
        $this->pintarTabla();
    }

    function pintarTabla() {
        // echo "<div class = 'sudoku'>";
        // for ($i=0; $i < self::FILAS; $i++) { 
        //     echo "<div class = 'fila-wrapper' >";
        //     for ($j=0; $j < self::FILAS; $j++) { 
        //         echo "<div class = 'cuadrado-wrapper' >";
        //         for ($k=0; $k < self::CUADRADOS; $k++) { 
        //                 echo "<div class = 'cuadrado'>$i - $j - $k </div>";
        //         }
        //         echo "</div>";
        //     }
        //     echo "</div>";
        // }
        // echo "</div>";

?>      <div class = 'sudoku'>
<?php   for ($i=0; $i < self::CUADRADOS; $i++) : ?>
            <div class = 'cuadrado-wrapper'>
<?php       for ($j=0; $j < self::CUADRADOS; $j++) : ?>
                    <div class = 'cuadrado'>
                        <select name="cuadrado<?="$i-$j"?>" id="cuadrado<?="$i-$j"?>">
                            <option value="null"></option>
                            <?php for ($k=1; $k <= self::CUADRADOS; $k++) : ?>
                                <option value="<?=$k?>"><?=$k?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
<?php       endfor; ?>
            </div>
<?php   endfor; ?>
        </div>
<?php        
    }
    
}