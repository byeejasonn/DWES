<?php
    $horario = [
        "Lunes" => ["DWEC","DWEC","DWEC","Recreo","EIE","EIE","Inglés"],
        "Martes" => ["Inglés","DAW","DAW","Recreo","DIW","DIW","DIW"],
        "Miercoles" => ["DIW","DIW","DIW","Recreo","DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","Recreo","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","Recreo","DWEC","DWEC","DWEC"]
    ];

    function print_horario($horario) {
        $i = 0;
        $dias = array_keys($horario);
?>
        <table class="horario">
            <tr>
                <?php foreach ($dias as $dia) : ?>
                    <th><?= $dia ?></th>
                <?php endforeach; ?> 
            </tr>
            <?php
                for ($i=0; $i < count($horario[$dias[array_key_first($dias)]]); $i++) :
                /*
                ya que necesito un indice que apunte a x posicion de cada dia para poder pintarlo teniendo en cuenta que pudiesen ser de diferente longitud

                para ello cuento los modulos del primer dia del array accediendo al primer valor del array $dias donde tengo las claves del array $horario

                eso hara que recorra todos los valores del array del primer dia, en este caso el "Lunes", al final del for para que el valor de $dias uso la funcion next() para que el puntero avance y ponga la segunda posicion del array, y asi sucesivamente...
                */
            ?>
                        <tr>
                            <?php 
                                foreach ($horario as $dia => $modulos) : 

                                    $rowspan = array_count_values($horario[$dia])[$modulos[$i]];
                                    
                                    /* 
                                    array_count devulve un array $clave => $suma
                                       Array = "dia de la semana"        $clave => $suma
                                    ej Array ( [DWES] => 3 [Recreo] => 1 [DWEC] => 3 ) Array ( [DWES] => 3 [Recreo] => 1 [DWEC] => 3 )
                                    como quiero acceder a el valor de un modulo en concreto añado al final de la funcion [$modulo[$i]] que es el modulo que quiero hacer print
                                    */

                                    $modulos = array_unique($modulos);

                                    /*
                                    con array_unique elimino los datos repetidos dentro del array
                                    Array ( [0] => DWEC [3] => Recreo [4] => EIE [6] => Inglés )
                                    Como he eliminado ciertas posiciones el indice es un caos
                                    */

                                    if (!empty($modulos[$i])) :

                                    /*
                                    Como el indice es un caos pero no es igual para cada array de cada dia recorro todas las posiciones comprobando si esta vacio o no, si no lo esta printa el valor y usa la variable rowspan que tiene la suma de horas de ese modulo en concreto
                                    */
                            ?>
                                        <td class="<?= $modulos[$i] ?>" rowspan="<?= $rowspan ?>" style="--index:<?= $rowspan ?>;"><?= $modulos[$i]; ?></td>
                            <?php
                                    endif;
                                endforeach; 
                            ?> 
                        </tr>
            <?php
                    next($dias);
                endfor;
            ?>
        </table>
<?php
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <link rel="stylesheet" href="./css/arrayhorario.css">
</head>
<body>
    <main>
        <div class="horario-wrapper">
            <h2 class="title">Horario</h2>
            <?= print_horario($horario) ?>
        </div>
    </main>
</body>
</html>