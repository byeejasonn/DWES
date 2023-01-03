<?php
    require('../conn.php');

    $config = Connection\Connection::singleton();
    // $conn = $config->getConn();

    if (empty($_GET['page'])) {
        $_GET['page'] = 1;
    }

    session_start();
    print_r($_SESSION);
    $_SESSION['limit'] = $_POST['limit'];

    function imprimirCiclistas($config) {
        // $stmt;
        // if(!empty($_POST['nombre'])) {
        //     $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas where nombre like :nombre LIMIT :limit OFFSET :offset");
        //     $nombre = "%".$_POST['nombre']."%";
        //     $stmt->bindParam(":nombre", $nombre);
        // } else {
        //     $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas LIMIT :limit OFFSET :offset");
        // }

        $stmt = $config::getConn()->prepare("SELECT nombre, num_trofeos as 'Numero trofeos' FROM Ciclistas WHERE nombre like :nombre LIMIT :offset , :limit");

        $paginacion = $config::getConn()->prepare("SELECT count(*) AS 'paginas' FROM Ciclistas WHERE nombre like :nombre");
        
        $nombre = '%%';
        $limit = $_POST['limit'];
        $offset = $_POST['limit'] * ($_GET['page'] - 1);

        if(!empty($_POST['nombre'])) {
            $nombre = "%{$_POST['nombre']}%";
        }

        $paginacion->bindParam(":nombre", $nombre);

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        
        $paginacion->execute();

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
                                <?php if ($key == "Numero trofeos") : ?>
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
            <?= imprimirPagination($paginacion) ?>
            <p>Filas: <?= $stmt->rowCount() ?></p>
<?php
        endif;
    }

    function imprimirDatalist($config) {
        $stmt = $config::getConn()->prepare("SELECT nombre FROM Ciclistas");
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

    function imprimirOffset() {
        $options = [5, 10, 20, 50, 100];

        if(!empty($_POST['limit'])) :
            $value = $_SESSION['limit'];

            if(in_array($value, $options)) : ?>
                <select name="limit" id="limit">
                    <?php foreach($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($option == $value)?'selected':''; ?> ><?= $option ?></option>
                    <?php endforeach; ?>
                </select>
<?php       endif; ?>
<?php   
        else: 
            $_POST['limit'] = 5;        
?>
            <select name="limit" id="limit">
                <?php foreach($options as $option) : ?>
                    <option value="<?= $option ?>" ><?= $option ?></option>
                <?php endforeach; ?>
            </select>
<?php   endif;
    }

    function imprimirPagination($paginacion) {
        $start = 1;
        // $end = $config::getConn()->query("SELECT count(*) as filas FROM Ciclistas")->fetch()["filas"] / $_POST['limit'];
        $end = $paginacion->fetch()['paginas'] / $_POST['limit'];
        // print_r($paginacion->fetch());

        if(empty($_GET['page'])) {
            $_GET['page'] = 1;
        }

        $current = $_GET['page'];
?>
        <div class="pagination">
            <?php if ($current > $start) : ?>
                <div class="prev"><a href="./ciclistas-form.php?page=<?= $current-1 ?>">⇦ <?= $current-1 ?></a></div>
            <?php endif; ?>
            <div class="current"><?= $_GET['page'] ?></div>
            <?php if ($current < $end) : ?>
                <div class="next"><a href="./ciclistas-form.php?page=<?= $current+1 ?>"><?= $current+1 ?> ⇨</a></div>
            <?php endif; ?>
        </div>
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
                Nombre: <input type="text" name="nombre" id="nombre" value="<?= $_POST['nombre'] ?>" list="ciclistas" autocomplete="off">
            </label>
            <?php imprimirOffset() ?> 
            <input type="submit" value="submit" name="submit">
        </form>
        <a href="./insert-ciclistas.php">Insertar Ciclista</a>
        <div class="ciclistas-wrapper">
            <?php imprimirCiclistas($config) ?> 
        </div>
        <?php imprimirDatalist($config) ?> 

        <p><a href="./ciclistas-form.php">Atras</a></p>
        
    </div>
</body>
</html>