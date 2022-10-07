<?php
    // generar numeros
    $numeros = [];
    for ($i=0; $i < 20; $i++) { 
        $numeros[] = rand(0,9);
    }
    print_r($numeros);

    // ordenar array
    asort($numeros);

    echo "<br>";
    print_r($numeros);

    // dividir por la mitad el array
    $primero = array_slice($numeros, 0, count($numeros)/2);
    $final = array_slice($numeros, count($numeros)/2);

    echo "<br>";
    print_r($primero);
    echo "<br>";
    print_r($final);

    // poner el principio al final
    foreach ($primero as $valor) {
        array_push($final, $valor);
    }

    echo "<br>";
    print_r($final);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado Alex y Dani</title>
</head>
<body>
    
</body>
</html>