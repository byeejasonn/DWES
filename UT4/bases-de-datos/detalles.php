<?php
    $dsn = 'mysql:host=localhost;dbname=dwes';
    $user = 'byeejasonn';
    $passwd = '1234';
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $conn = new PDO($dsn, $user, $passwd, $options);

    $stmt = $conn->query("SELECT nombre, num_trofeos FROM Ciclistas WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);

    imprimirDetalles($stmt);

    $stmt = null;
    $conn = null;

    function imprimirDetalles($stmt) {
        $result = $stmt->fetchAll();

        foreach ($result as $key => $value) : ?>
            <p>El ciclista <?= $value['nombre'] ?> tiene 

                <?php for ($i=0; $i < count($value['num_trofeos']); $i++) : ?>
                    1
                <?php endfor; ?>
            </p>       
<?php   endforeach;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Ciclista</title>
</head>
<body>
    
</body>
</html>