<?php
    foreach ($_SERVER as $key => $value) {
        echo "$key => $value <br>";
    }

    $language = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
    $ip = $_SERVER['REMOTE_ADDR'];
    $cliente = explode(';',$_SERVER['HTTP_USER_AGENT'])[1];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT4</title>
    <style>
        * {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <h3>Datos</h3>
    <?php
        switch ($language) {
            case 'es-ES':
                echo "IP cliente: $ip<br>Navegador Cliente: $cliente";
                break;
            
            case 'en-US':
                echo "Client IP: $ip<br>Client Web Browser: $cliente";
                break;
        }
    ?>
</body>
</html>