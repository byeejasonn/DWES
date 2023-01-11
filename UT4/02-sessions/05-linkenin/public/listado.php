<?php

require('../src/init.php');

$DB->ejecuta("SELECT * FROM usuarios");

$data = $DB->obtenDatos();

// print_r($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $TITLE ?></title>
</head>
<body>
    <h2>Hola mundo</h2>
    <div class="listado">
        <table>
            <?php foreach($data as $fila) : ?>
                <tr>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['correo'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>