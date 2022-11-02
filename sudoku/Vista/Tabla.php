<?php

class Tabla {
    private const FILAS = 3;
    private const CUADRADOS = 9;
    private const PISTAS = [17, 25];
    // private $tabla = array();
    private $pistas = 0;

    private $tabla = [
        [4,0,0,0,0,0,1,5,3],
        [1,5,3,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0],
        [2,0,0,0,0,0,1,5,3],
        [0,0,0,2,0,0,0,0,0],
        [0,1,0,0,0,0,0,0,0],
        [0,0,2,0,0,0,0,0,0],
        [3,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0],

    ];

    function __construct() {
        // $this->tabla = array_fill(0, self::CUADRADOS, array_fill(0, self::CUADRADOS, 0));
        // if (isset($_POST['submit'])) {
        //     $this->tablaToJson();
        // }
        // $this->backTracking();
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
<?php   for ($i=0; $i < count($this->tabla); $i++) : ?>
            <?php $borderFila = ($i%self::FILAS == 0 && $i != 0)?'border-fila':''; ?>
            <div class = 'fila-wrapper <?= $borderFila ?>'>
<?php       for ($j=0; $j < count($this->tabla[$i]); $j++) : ?>
                <?php $borderColumna = ($j%self::FILAS == 0 && $j != 0)?'border-columna':''; ?>
                <div class = 'cuadrado <?= $borderColumna ?>'>
                    <?php if ($this->tabla[$i][$j] == 0 ) : ?>
                        <select name="<?="$i-$j"?>" id="cuadrado<?="$i-$j"?>">
                            <?php for ($k=0; $k <= self::CUADRADOS; $k++) : ?>
                                <option value="<?=$k?>" <?= ($k == 0)?'selected':''; ?> ><?= ($k == 0)?'':$k ?></option>
                            <?php endfor; ?>
                        </select>
                    <?php else: ?>
                        <select name="<?="$i-$j"?>" id="cuadrado<?="$i-$j"?>">
                                <option value="<?=$this->tabla[$i][$j]?>" selected><?= $this->tabla[$i][$j] ?></option>
                        </select>
                    <?php endif; ?>
                </div>
<?php       endfor; ?>
            </div>
<?php   endfor; ?>
        </div>
<?php        
    }

    function backTracking() {
        // for ($i=0; $i < 81; $i++) { 
            // $row = floor($i/9);
            // $col = $i%9;

            $row = 3;
            $col = 0;
            $fullRow = $this->tabla[$row];
            $fullCol = array_column($this->tabla, $col);

            // print_r($fullRow);
            // echo "<br>";
            // print_r($fullCol);
        // }
    }

    function save() {
        $respuesta = array_diff($_POST, ['Enviar']);

        foreach ($respuesta as $key => $value) {
            $key = explode('-', $key);
            $this->tabla[$key[0]][$key[1]] = $value;
        }
    }
}