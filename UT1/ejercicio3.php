<?php
// generacion dinamica de contenido

echo "Hola mundo!<br>";
$msg1 = "Hola mundo! ";
echo $msg1."<br>";
$msg2 = "Esta página ha sido programada por ";
$programador = "Jason Londoño";
echo $msg1.$msg2.$programador."<br>";
echo $msg1."<i>".$msg2."<b>".$programador."</b></i>";

$nombre = "Jason Londoño";
$r = "5";
// $pi = M_PI;

function area($r) {
    return M_PI*pow($r,2);
}
function perimetro($r) {
    return 2*M_PI*$r;
}

function piramide($n) {
    for ($i=1;$i<=$n;$i++) {
        for ($j=1;$j<=$i;$j++) {
            echo "<span style=color:#".dechex(rand(0,255)),dechex(rand(0,255)),dechex(rand(0,255)).";>*</span>";
        }
        echo "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
    <style>
        .saludo{
            color: green;
        }
        .area{
            color: red;
        }
        .perimetro{
            color: blue;
        }
        .piramide{
            margin: 10px 30px;
            width: fit-content;
            text-align: center;
        }
    </style>
</head>
<body>

    <br>
    <br>

    <h3 class="saludo">Bienvenido <?=$nombre?></h3>
    <span class="area">Área: <?=round(area($r),2)?>cm</span><br>
    <span class="perimetro">Perímetro: <?=round(perimetro($r),2)?>cm</span><br>

    <div class="piramide">
        <?php piramide(5) ?>
    </div>
</body>
</html>