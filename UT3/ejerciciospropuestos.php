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

    function mayor_menor() {
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

    function for_frase($cadena) {
        for($i=0; $i< strlen($cadena); $i++) {
            echo "<h4>{$cadena[$i]}</h4>";
        }
    }

    function while_frase($cadena) {
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

    function random_hasta_primo() {
        do {
            $num = mt_rand(0,100);
            echo "<span>$num</span> ";
        } while(!esPrimo($num) && $num != 17);
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
    <h2>Condicionales</h2>
    <?php mayor_menor() ?>
    <h2>Bucles</h2>
    <?php for_frase($frase) ?>
    <br>
    <?php while_frase($frase) ?>
    <br>
    <?php a($frase) ?>
    <br>
    <?php random_hasta_primo() ?>
</body>
</html>