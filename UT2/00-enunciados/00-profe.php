<?php

$personas = [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

function formalidad($personas, $index) {
    if($personas[1]) {
        $array[$index] = "Señor ".$personas[0];
    } else {
        $array[$index] = "Señora ".$personas[0];
    }

    echo $array[$index]."<br>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado Jorge</title>
</head>
<body>
    <?php
    array_walk($personas,"formalidad")
    ?>
</body>
</html>