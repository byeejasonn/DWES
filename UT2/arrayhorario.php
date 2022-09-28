<?php
    $horario = [
        "Lunes" => ["DWEC","DWEC","DWEC","Recreo","EIE","EIE","Inglés"],
        "Martes" => ["Inglés","DAW","DAW","Recreo","DIW","DIW","DIW"],
        "Miercoles" => ["DIW","DIW","DIW","Recreo","DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","Recreo","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","Recreo","DWEC","DWEC","DWEC"]
    ];

    function print_horario($horario) {
        //$keys = 

        echo array_keys($horarios);

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
</head>
<body>
    <h2>Horario</h2>
    <?= print_horario($horario) ?>
</body>
</html>