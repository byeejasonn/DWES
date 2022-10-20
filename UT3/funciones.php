<?php 

    $frase = "Hola buenas soy jason";

    function esPrimo($num){
        if ($num == 0 || $num == 1){
            return true;
        } else {
            $esprimo = true;
            $cont = 2;
            while($esprimo && $cont <= ($num/2)) {
                if(($num % $cont) == 0 ){
                    $esprimo = false;
                }
                $cont++;
            }
            return $esprimo;
        }
    }

    function mayorMenor() {
        $num1 = mt_rand(0, 100);
        $num2 = mt_rand(0, 100);
        $num3 = mt_rand(0, 100);

        $mayor;
        $mediano; 
        $menos;

        if ($num1 > $num2 & $num1 > $num3) :
            $mayor = $num1;
            if ($num2 > $num3) :
                $mediano = $num2;
                $menor = $num3;
            else : 
                $mediano = $num3;
                $menor = $num2;
            endif;
        elseif ($num2 > $num1 & $num2 > $num3) :
            $mayor = $num2;
            if ($num1 > $num3) :
                $mediano = $num1;
                $menor = $num3;
            else : 
                $mediano = $num3;
                $menor = $num1;
            endif;
        elseif ($num3 > $num1 & $num3 > $num2) :
            $mayor = $num3;
            if ($num1 > $num2) :
                $mediano = $num1;
                $menor = $num2;
            else : 
                $mediano = $num2;
                $menor = $num1;
            endif;
        endif;

        echo "<h1>$mayor</h1> <h2>$mediano</h2> <h3>$menor</h3>";
    }

    function forFrase($cadena) {
        for($i=0; $i< strlen($cadena); $i++) {
            echo "<h4>{$cadena[$i]}</h4>";
        }
    }

    function whileFrase($cadena) {
        $i = 0;
        while($i < strlen($cadena)) {
            echo "<h4>{$cadena[$i]}</h4>";
            $i++;
        }
    }

    function a($cadena) {
        $i = 0;
        while($i < strlen($cadena) && ($cadena[$i] != 'a' && $cadena[$i] != 'A')) {
            echo "<h4>{$cadena[$i]}</h4>";
            $i++;
        }
    }

    function randomHastaPrimo() {
        do {
            $num = mt_rand(0,100);
            echo "<span>$num</span> ";
        } while(!esPrimo($num) && $num != 17);
    }

    function url() {
        if (!empty($_GET)) :
?>
        <table>
            <tr><th>Table</th><th>Valor</th></tr>
        <?php foreach ($_GET as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
<?php  
        endif;
    }

    function sumaEntre($inicio, $fin) {
        $carry = 0;

        if ($inicio < $fin) {
            for ($i=$inicio+1; $i < $fin; $i++) { 
                $carry += $i;
            }
        } elseif ($inicio > $fin) {
            for ($i=$fin+1; $i < $inicio; $i++) { 
                $carry += $i;
            }
        }

        return $carry;
    }

    function concatena($separador, ...$cadenas) {
        //$separador = $cadenas[0];
        $carry = '';

        foreach($cadenas as $key => $palabra) {
            $carry .= $palabra.$separador;
        }

        return trim($carry, $separador);
    }

    function analizParametros(...$varios) {
        $array = [];
        foreach($varios as $key => $value) {
            if(!array_key_exists(gettype($value), $varios)) {
                $array[gettype($value)] = 1;
            } else {
                $array[gettype($value)]++;
            }
        }

        return $array;
    }

    function swapValues(&$var1, &$var2) {
        $aux = $var1;
        $var1 = $var2;
        $var2 = $aux;
    }

    function genArray($num = 10, $max = 10, $min = 0) {
        for ($i=0; $i<$num; $i++) {
            $array[$i] = mt_rand($min, $max);
        }

        return $array;
    }

    function modificarValoresTipo(&$valores) {
        $pow = 2;

        foreach ($valores as &$valor) {
            if (is_int($valor)) {
                $valor = pow($valor, $pow);
                $pow++;
            } elseif (is_float($valor)) {
                $valor *= -1;
            } elseif (is_string($valor)) {
                $valor = strtolower($valor) ^ strtoupper($valor) ^ $valor;
            }
        }
    }

    function generarForm($value, $key) {
?>
    <form method="post" id="datos-personales">
        <?php if(is_string($value)) : ?>
            <label for="<?= $key ?>"><?= ucfirst($key) ?></label><br><input type="text" name="<?= $key ?>" id="<?= $key ?>" value="<?= $value ?>"><br><br>
        <?php elseif(is_int($value)): ?>
            <label for="<?= $key ?>"><?= ucfirst($key) ?></label><br><input type="number" name="<?= $key ?>" id="<?= $key ?>" value="<?= $value ?>"><br><br>
        <?php endif; ?>
    </form>
<?php
    }

    function generaSelect(array $opciones, int $seleccionada = -1) {
?>
    <select name="provincias" id="provincias">
        <?php foreach($opciones as $key => $value) : ?>
            <option value="<?= $key ?>" <?= ($value == $seleccionada)?"selected":""; ?> ><?= $key ?></option>
        <?php endforeach; ?>
    </select>
<?php
    }

    function imprimeTabulado($cosas, $tab = 0) {
        $aux = '';
        for($i = 0; $i < $tab; $i++) $aux .= '_';

        foreach ($cosas as $key => $value) {
            if (is_array($value)) {
                echo $aux.gettype($value)."<br>";
                imprimeTabulado($value, ($tab + 5));
            } else {
                echo  $aux.$value."<br>";
            }
        }
    }

    function invertirCadena($cadena) {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 3</title>
    <style>
        * {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <h1>-- Condicionales</h1>
    <?php mayorMenor() ?>

    <h1>-- Bucles</h1>
    <?php forFrase($frase) ?>
    <br><br>
    <?php whileFrase($frase) ?>
    <br><br>
    <?php a($frase) ?>
    <br><br>
    <?php randomHastaPrimo() ?>
    <br><br>
    <?php url() ?>

    <h1>-- Funciones</h1>
    <?php for ($i=0; $i < 10; $i++) { 
        echo "<p>".sumaEntre(mt_rand(0,20), mt_rand(0,20))."</p>";
    } ?>
    <br><br>
    <?php 
        echo concatena(" ", "Hola", "mundo", "!")."<br>";
        echo concatena(".", "Esto", "son", "varias", "cadenas", "puntos"); 
    ?>
    <br><br>
    <?php
        $analisis = analizParametros(3, "h", 'hola', [1,2,3], [1], "h");
        print_r($analisis);
    ?>
    <br><br>
    <?php
        $var1 = 1;
        $var2 = 2;
        echo "var1: $var1 || var2: $var2 <br>";
        swapValues($var1, $var2);
        echo "var1: $var1 || var2: $var2<br>";

        $var1 = "hola";
        $var2 = 2;
        echo "var1: $var1 || var2: $var2 <br>";
        swapValues($var1, $var2);
        echo "var1: $var1 || var2: $var2 <br>"; 
    ?>
    <br>
    <?php
        print_r(genArray());
        echo "<br>";
        print_r(genArray(5));
        echo "<br>";
        print_r(genArray(5,50));
        echo "<br>";
        print_r(genArray(5,50,-50));
    ?>
    <br><br>
    <?php
        $array = [
            "Hola",
            3,
            3.4,
            -1.2,
            2,
            "Que Tal"
        ];
        
        print_r($array);
        echo "<br>";
        modificarValoresTipo($array);
        print_r($array);
    ?>
    <br><br>
    <?php
        $yo = [
            "nombre" => "Jorge Dueñas Lerín",
            "dirección" => "Calle falsa número 1234",
            "teléfono" => "91 123 45 67",
            "población" => "Madrid",
            "edad" => 23,
        ];

        array_walk($yo, "generarForm");
    ?>
    <br><br>
    <?php
        $opciones = [
            "Madrid" => 28,
            "Sevilla" => 17,
            "Cáceres" => 56,
        ];

        generaSelect($opciones);
        echo "<br><br>";
        generaSelect($opciones, 17);
    ?>
    <h3>Ejercicio 14</h3>
    <?php
        $cosas = [
            3,
            "frutas"  => ["a" => "naranja", "b" => [1, 2], "c" => "manzana"],
            "números" => [1, 2, 3, 4, 5, 6],
            "hoyos"   => ["primero", 5 => "segundo", "tercero"],
            "asd"
        ];

        imprimeTabulado($cosas);
    ?>

    <h3>Ejercicio 15</h3>
    <?php
        invertirCadena('Jason');
    ?>

</body>
</html>