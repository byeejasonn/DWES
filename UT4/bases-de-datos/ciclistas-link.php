<?php

    $dsn = 'mysql:host=localhost;dbname=dwes';
    $user = 'byeejasonn';
    $passwd = '1234';
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $conn = new PDO($dsn, $user, $passwd, $options);

    $stmt = $conn->query("SELECT * FROM Ciclistas");

    imprimirLista($stmt);

    $stmt = null;
    $conn = null;
    



    function imprimirLista($stmt) {
        $result = $stmt->fetchAll();
?> 
        <ul> 
            <?php foreach ($result as $key => $value) : ?>
                <li>
                    <a href="detalles.php?id=<?= $value['id'] ?>"><?= $value['nombre'] ?></a>
                </li>    
            <?php endforeach; ?>
        </ul>
<?php  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado ciclistas</title>
</head>
<body>
    
</body>
</html>