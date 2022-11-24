<?php
    require("../conn.php");

    $config = Connection\Connection::singleton();
    $conn = $config->getConn();

    $tableNames = array_column(($conn->query("DESC Ciclistas")->fetchAll()), "Field");
    array_shift($tableNames);
    
    $errores = [];
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $numTrofeos = $_POST['num_trofeos'];

        if (!empty($nombre) && !preg_match("/[a-zA-Z]{3,8}/", $nombre)) {
            $errores['nombre'] = "El nombre debe tener de 3 a 8 caracteres";
        }

        if (!empty($numTrofeos) && $numTrofeos < 0 && $numTrofeos > 10) {
            $errores['num_trofeos'] = "El ciclista puede entre 0 a 10 trofeos";
        }

        if (count($errores) == 0) {
            $stmt = $conn->prepare("INSERT INTO Ciclistas (nombre, num_trofeos) values (:nombre, :num)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':num', $numTrofeos);

            if($stmt->execute()) :?>
                <p class="success">Se ha añadido el usuario</p>
<?php           endif;
        } else {

        }
    }

    function printErrors($errores) {
        foreach ($errores as $key => $value) : ?>
            <p><?= "$key => $value" ?></p>
<?php   endforeach;            
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Ciclistas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <h3>Insertar Ciclistas</h3>
        <form action="" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="num_trofeos">Numero Torfeos </label>
            <input type="number" name="num_trofeos" id="num_trofeos" min="0" max="10" step="1">

            
            <input type="submit" name="submit" value="submit">
        </form>    
        <?= printErrors($errores) ?>

        <a href="./ciclistas-form.php">Atras</a>
    </div>
</body>
</html>