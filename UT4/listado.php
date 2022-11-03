<?php
    $playlist = file_get_contents(
        "playlist.csv"
    );

    $playlist = explode("\n",$playlist);
    array_pop($playlist);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
    <style>
        * {
            font-family: Arial;
            box-sizing: border-box;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Cancion</th>
            <th>Hora</th>
        </tr>
        <?php foreach ($playlist as $key => $value) : ?>
            <tr>
                <?php $value = explode(';', $value); ?>
                <td><?= $value[0] ?></td>
                <td><?= $value[1] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="formulario.php">Inicio</a>
</body>
</html>