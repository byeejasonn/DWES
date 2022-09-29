<?php
    $horario = [
        "Lunes" => ["DWEC","DWEC","DWEC","Recreo","EIE","EIE","Inglés"],
        "Martes" => ["Inglés","DAW","DAW","Recreo","DIW","DIW","DIW"],
        "Miercoles" => ["DIW","DIW","DIW","Recreo","DWES","DWES","DWES"],
        "Jueves" => ["EIE","DAW","DAW","Recreo","DWES","DWES","DWES"],
        "Viernes" => ["DWES","DWES","DWES","Recreo","DWEC","DWEC","DWEC"]
    ];

    function print_horario($horario) {
        $error = false;
        $i = 0;
        $dia = key($horario);
        $rowspan = 0;
?>
        <table class="horario">
            <tr>
                <?php foreach ($horario as $dia => $modulos) : ?>
                    <th><?= $dia; ?></th>
                <?php endforeach; ?> 
            </tr>
            <?php
                while(!$error) :
                    if ($i < count($horario[$dia])) : 
            ?>
                        <tr>
                            <?php 
                                foreach ($horario as $dia => $modulos) : 

                                    $rowspan = array_count_values($horario[$dia])[$modulos[$i]];
                                    $modulos = array_unique($modulos);

                                    if (!empty($modulos[$i])) :
                            ?>
                                        <td class="<?= $modulos[$i] ?>" rowspan="<?= $rowspan ?>" style="--index:<?= $rowspan ?>;"><?= $modulos[$i]; ?></td>
                            <?php
                                    endif;
                                endforeach; 
                            ?> 
                        </tr>
            <?php   else :
                        $error = true;
                    endif;
                    $i++;
                endwhile;
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