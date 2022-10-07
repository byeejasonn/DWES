<?php
    $tareas = [
        "Limpiar",
        "Cocinar",
        "Poner la mesa",
        "Recoger la mesa",
        "Lavar y guardar los platos",
        "Lavar la ropa",
        "Doblar y guardar la ropa limpia"
    ];

    $personas = [
        "Daniel",
        "Mario",
        "Jason",
        "Erick"
    ];

    $tareas_asignadas = [];

    foreach ($tareas as $tarea) {
        $tareas_asignadas[$tarea] = $personas[array_rand($personas, 1)];
    }

    print_r($tareas_asignadas);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado Nacho</title>
</head>
<body>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/back.php") ?>
</body>
</html>