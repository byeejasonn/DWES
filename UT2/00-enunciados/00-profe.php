<?php

$personas = [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

$comida = [
    0 => ["Banana", 3, 56],
    1 => ["Chuleta", 1, 256],
    2 => ["Pan", 1, 90]
];

function formalidad($personas, $index) {
    
    $array[$index] = ($personas[1]?'Señor ':'Señora ') . $personas[0];

    echo $array[$index]."<br>";
}

function calorias($carry, $item) {
    $carry += $item[1]*$item[2];
    return $carry;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado Jorge</title>
    <style>
        * {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <?php
        array_walk($personas,"formalidad");

        echo "<br>Calorias totales: ".array_reduce($comida, "calorias");
    ?>
</body>
</html>