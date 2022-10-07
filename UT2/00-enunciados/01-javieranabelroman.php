<?php
    $array1 = [
        1,
        2,
        3,
        4,
        234,
        23,
        12,
        43,
    ];
    $array2 = [
        453,
        5,
        87,
        12,
        43,
        1,
        2,
        3,
    ];
    $array3 = array_intersect($array1, $array2);

    $array4 = array_diff($array1, $array3);

    print_r($array1);
    echo "<br>";
    print_r($array2);
    echo "<br>";
    print_r($array3);
    echo "<br>";
    print_r($array4);
    echo "<br>";
    print_r(array_merge($array3, $array4));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado Repelente</title>
</head>
<body>
    
</body>
</html>