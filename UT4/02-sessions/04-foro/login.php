<?php
    // autoload
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path{$file}.php");
    });

    $form = new php\Config\Form();
    // crea todos los inputs y se guardan automaticamente en un array con la clave :<<nombre>> para introducirlo a la base de datos
    @$form->crearInputsLogin($_POST);
    // print_r($_POST);

    if(isset($_POST["submit"])) {
        print_r($_POST);
        $user = $form->getUser($_POST);

        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Login</title>
    <script src="./js/main.js" defer></script>
</head>
<body>
    <?php require('header.php') ?>

    <div class="content-wrapper">
        <h1>Inicio de sesión</h1>

        <?= $form->crearForm("", "POST") ?>
    </div>


</body>
</html>