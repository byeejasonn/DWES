<?php

class Tabla {
    private const FILAS = 3;
    private const CUADRADOS = 9;
    private const PISTAS = 17;

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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
<?php       endfor; ?>
            </div>
<?php   endfor; ?>
        </div>
<?php        
    }
    
}