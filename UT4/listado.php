<?php
    $playlist = file_get_contents(
        "playlist.csv"
    );

    $playlist = explode("\n",$playlist);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
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
</body>
</html>