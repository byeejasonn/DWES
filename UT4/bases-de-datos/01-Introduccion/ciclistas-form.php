<?php
    require('../conn.php');

    $config = Connection\Connection::singleton();
    $conn = $config->getConn();

    function imprimirCiclistas($conn) {
        $stmt;
        if(!empty($_POST['nombre'])) {
            $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas where nombre like :nombre");
            $nombre = "%".$_POST['nombre']."%";
            $stmt->bindParam(":nombre", $nombre);
        } else {
            $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas");
        }
        
        $stmt->execute();
        $ciclistas = $stmt->fetchAll();

        if ($stmt->rowCount() == 0) : ?>
            <h3>No se ha encontrado ningún ciclista</h3>
<?php
        else :
?>
    <table>
        <tr>
            <?php foreach ($ciclistas[0] as $key => $value) : ?>
                <th><?= ucfirst($key) ?></th>
            <?php endforeach; ?>
        </tr>
        
        <?php foreach ($ciclistas as $ciclista) : ?>
            <tr>
                <?php foreach ($ciclista as $key => $value) : ?>
                    <td>
                        <?php if ($key == "num_trofeos") : ?>
                            <?php for ($i=0; $i < $value; $i++) : ?>
                                <img src="./trophy-solid.svg" alt="trohpy" class='icon' draggable='false'>
                            <?php endfor; ?>
                                (<?= $value ?>)
                        <?php else: ?>
                            <?= $value ?>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
        endif;
    }

    function imprimirDatalist($conn) {
        $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas");
        $stmt->execute();
        $ciclistas = $stmt->fetchAll();
?>
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
        <a href="./insert-ciclistas.php">Insertar Ciclista</a>
        <?php imprimirCiclistas($conn) ?> 
        <?php imprimirDatalist($conn) ?> 

        <p><a href="./ciclistas-form.php">Atras</a></p>
        
    </div>
</body>
</html>