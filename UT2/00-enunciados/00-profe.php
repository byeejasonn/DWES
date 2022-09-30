<?php

$personas = [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

function formalidad($index, $persona) {
    print_r($algo);
    //print_r($persona);
    foreach ($persona as $nombre => $sexo) {
        echo $nombre;
        // if($sexo) {
        //     $array[] = "Señor $nombre";
        // } else {
        //     $array[] = "Señora $nombre";
        // }
    }
    echo "<br>";
    //print_r($array);
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