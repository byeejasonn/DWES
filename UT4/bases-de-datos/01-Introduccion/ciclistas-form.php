<?php
    require('../conn.php');

    $config = Connection\Connection::singleton();
    $conn = $config->getConn();

    function imprimirCiclistas($conn) {
        $stmt;
        if(!empty($_POST['nombre'])) {
            $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas where nombre like :nombre");
            $nombre = $_POST['nombre']."%";
            $stmt->bindParam(":nombre", $nombre);
        } else {
            $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas");
        }
        
        $stmt->execute();
        $ciclistas = $stmt->fetchAll();

?>
    <table>
        <tr>
            <?php foreach ($ciclistas[0] as $key => $value) : ?>
                <th><?= ucfirst($key) ?></th>
            <?php endforeach; ?>
        </tr>
        
        <?php foreach ($ciclistas as $ciclista) : ?>
            <tr>
                <?php foreach ($ciclista as $value) : ?>
                    <th><?= $value ?></th>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>


    <!-- hacer funcion aparte -->
    <datalist id="ciclistas">
        <?php foreach ($ciclistas as $ciclista) : ?>
            <option value="<?= ucfirst($ciclista['nombre']) ?>"></option>
        <?php endforeach; ?>
    </datalist>
<?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclistas Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">
        <form action="" method="POST">
            <label>
                Nombre: <input type="text" name="nombre" id="nombre" list="ciclistas" autocomplete="off">
            </label>
        </form>
        <?php imprimirCiclistas($conn) ?> 
    </div>
</body>
</html>