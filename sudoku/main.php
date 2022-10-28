<?php
    require('./Vista/Tabla.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku</title>
    <style>
        .fila {
            display: flex;
        }

        .cuadrado {
            width: 50px;
            height: 50px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $tabla = new Tabla();
        $tabla->pintarTabla();
    ?>
</body>
</html>