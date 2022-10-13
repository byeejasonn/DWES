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
            $array[gettype($value)] += 1;
        }

        return $array;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 3</title>
</head>
<body>
    <h1>-- Condicionales</h1>
    <?php mayorMenor() ?>

    <h1>-- Bucles</h1>
    <?php forFrase($frase) ?>
    <br>
    <?php whileFrase($frase) ?>
    <br>
    <?php a($frase) ?>
    <br>
    <?php randomHastaPrimo() ?>
    <br>
    <?php url() ?>

    <h1>-- Funciones</h1>
    <?php for ($i=0; $i < 10; $i++) { 
        echo "<p>".sumaEntre(mt_rand(0,20), mt_rand(0,20))."</p>";
    } ?>
    <br>
    <?php 
        echo concatena(" ", "Hola", "mundo", "!")."<br>";
        echo concatena(".", "Esto", "son", "varias", "cadenas", "puntos"); 
    ?>
    <br>
    <?php
        $analisis = analizParametros(3, "h", 'hola', [1,2,3], [1], "h");
        print_r($analisis);
    ?>
</body>
</html>