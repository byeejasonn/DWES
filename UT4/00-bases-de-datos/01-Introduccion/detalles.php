<?php
    try {
        
        $dsn = 'mysql:host=localhost;dbname=dwes';
        $user = 'byeejasonn';
        $passwd = '1234';
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
    
        $conn = new PDO($dsn, $user, $passwd, $options);
    
        $stmt = $conn->prepare("SELECT nombre, num_trofeos FROM Ciclistas WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);
    
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    function imprimirDetalles($stmt) {
        $stmt->execute();

        foreach ($stmt->fetchAll() as $key => $value) : ?>
            <p>El ciclista <b><?= $value['nombre'] ?></b> tiene 

                <?php for ($i=0; $i < $value['num_trofeos']; $i++) : ?>
                    <img src="./trophy-solid.svg" alt="trohpy" class='icon' draggable='false'>
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <h3>Ciclista</h3>
        <?php imprimirDetalles($stmt); ?>
        <a href="./ciclistas-link.php">Atras</a>
    </div>
</body>
</html>