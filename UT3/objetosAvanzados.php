<?php

    require('./clases/Config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos Avanzados</title>
</head>
<body>
    <h2>Singleton</h2>
    <?php

    $config1 = Config::singleton();
    $config2 = Config::singleton();

    $config1->setNombre('Jason');
    $config2->setNombre('Mario');
    
    // al ser la misma instaciacion se quedan con el nombre que se ha definido por ultima vez
    echo $config1->getNombre()."<br>";
    echo $config2->getNombre()."<br>";
    ?>

    <h2>Interfaces</h2>
    <?php
    
    ?>
</body>
</html>