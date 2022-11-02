<?php
    require('./Vista/Tabla.php');

    $tabla = new Tabla();

    if (isset($_POST['submit'])) {
        $tabla->save();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku</title>
    <style>
        :root {
            --cuadrado-with: 60px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial;
        }

        .sudoku {
            width: fit-content;
            margin: 40px auto;
        }

        .cuadrado {
            width: var(--cuadrado-with);
            height: var(--cuadrado-with);
            border: 1px solid black;
        }

        .fila-wrapper {
            display: flex;
        }

        .border-fila {
            border-top: 3px solid black;
        }

        .border-columna {
            border-left: 3px solid black;
        }


        .cuadrado select {
            width: 100%;
            height: 100%;
            background-color: white;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            text-align: center;
            font-size: 20px;
            outline: none;
            border: none;
        }
    </style>
</head>
<body>
    <form action="main.php" method="POST" >
        <?php
            $tabla->pintarTabla();
        ?>

        <input type="submit" value="Enviar" name="submit">
    </form>
</body>
</html>