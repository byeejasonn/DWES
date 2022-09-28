<?php
    $horario = [
        "Lunes" => ["DWEC","DWEC","DWEC","Recreo","EIE","EIE","Inglés"],
        "Martes" => ["Inglés","DAW","DAW","Recreo","DIW","DIW","DIW"],
        "Miercoles" => ["DIW","DIW","DIW","Recreo","DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","Recreo","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","Recreo","DWEC","DWEC","DWEC"]
    ];

    function print_horario($horario) {
        $keys = array_keys($horario);
        // $fila = "";



        // for ($i=0; $i < count($horario[key($horario)]); $i++) { 
        //     for ($j=0; $j < count($horario); $j++) { 
        //         // echo $horario[$keys[$j][$i]];
        //         echo $horario[$keys[$j]][$i];
        //     }
        //     next($horario);
        //     echo "<br>";
        // }

        // foreach ($horario as $dia => $modulos) {
        //     // print_r($horario[$dia]);

        // ?>
        // <div class="vertical">
        // <?php    foreach ($modulos as $index => $modulo) {
        //         echo "<span>$modulo</span>";
        //     }
        // ?>
        // </div>
        // <?php
        //     echo "<br>";
        // }

        // return $fila;


        // for ($i=0; !is_null($horario[key($horario)]) && $i < count($horario[key($horario)]); $i++) { 
        //     echo key($horario)." ".count($horario[key($horario)])."<br>";

            

        //     next($horario);
        // }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <style>
        .horario {
            display: flex;
            width: fit-content;
        }
        .vertical {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <h2>Horario</h2>
    <div class="horario">
        <?= print_horario($horario) ?>
    </div>
</body>
</html>