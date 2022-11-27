<?php
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $form = new Config\Form();
    $form->crearInputs($_POST);
    print_r($_POST);

    if(isset($_POST["submit"])) {
        $form->validarForm();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <?= $form->crearForm("", "POST") ?>
</body>
</html>