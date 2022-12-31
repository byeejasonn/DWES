<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/contacto.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Contacto</title>
</head>
<body>

    <?php require('header.php'); ?>

    <div class="content-wrapper">
        <h1>Formulario</h1>
        <div class="content-section">
            <form action="#" method="get" id="form">
                <div>
                    <label for="username">
                        <span>Nombre:</span> 
                    </label>
                        <input type="text" pattern=".{2,10}" title="mínimo 4 caracteres, 10 máximo" placeholder="username" id="username" required>
                </div>
                <div>
                    <label for="mail1">
                        <span>Correo:</span> 
                    </label>
                        <input type="text" pattern="[a-zA-Z0-9_-]+@[a-zA-Z0-9+%]+\.[a-z]{2,4}" title="El campo debe tener @ y un ." placeholder="mail@example.com" id="mail1" required>
                </div>
                <div>
                    <label for="mail2">
                        <span>Confirmar correo:</span> 
                    </label>
                        <input type="text" pattern="[a-zA-Z0-9_-]+@[a-zA-Z0-9+%]+\.[a-z]{2,4}" title="El campo debe tener @ y un ." placeholder="mail@example.com" id="mail2" required>
                </div>
                <div>
                    <label for="age">
                        <span>Edad:</span> 
                    </label>
                        <input type="number" min="6" max="99" value="18" id="age" step="1">
                </div>
                <div id="label-msg">
                    <label for="msg">
                        <span>Mensaje:</span> 
                    </label>
                        <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Escriba aquí el mensaje que quiera enviar"></textarea>
                </div>
                <div>
                    <input type="submit" name="Enviar" id="submit">
                </div>
            </form>
        </div>
    </div>
    
    <?php require('footer.php'); ?>

    <script src="./js/main.js"></script>
</body>