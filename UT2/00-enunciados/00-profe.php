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

function printar_array($valor) {
    echo "$valor <br>";
}

function formalidad($personas) {
    $persona = ($personas[1]?'Señor ':'Señora ') . $personas[0];
    return $persona;
}

function calorias($carry, $item) {
    $carry += $item[1]*$item[2];
    return $carry;
}

$hombres = array_column(array_filter($personas, function($persona, $index){
    return $persona[1];
}, 1), 0);

$mujeres = array_column(array_filter($personas, function($persona, $index){
    return !$persona[1];
}, 1), 0);

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

    <p><b>Apartado 1</b></p>
    <?php
        $resultado = array_map("formalidad", $personas);

        array_walk($resultado, "printar_array");
    ?>

    <p><b>Apartado 2</b></p>
    <?php
        echo "Calorias totales: ".array_reduce($comida, "calorias");
    ?>

    <p><b>Apartado 3</b></p>
    <?php
        array_walk($hombres, "printar_array");
        array_walk($hombres, "printar_array");
    ?>

<?php include("{$_SERVER['DOCUMENT_ROOT']}/back.php") ?>
</body>
</html>