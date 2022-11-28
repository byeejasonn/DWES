<?php
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $form = new Config\Form();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="main">
        <h3>Listado de registros</h3>
        <table>
            <tr>
                <?php foreach ($form->getListado()[0] as $key => $fila) : ?>
                    <th><?= $key ?></th>
                <?php endforeach; ?>
            </tr>

            <?php foreach ($form->getListado() as $key => $fila) : ?>
                <tr>
                    <?php foreach ($fila as $campo) : ?>
                        <td><?= $campo ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="./index.php">Inicio</a>
    </div>
</body>
</html>