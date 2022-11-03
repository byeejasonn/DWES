<?php
    // para poner la zona horaria de madrid 
    date_default_timezone_set('Europe/Madrid');

    $tema = '';
    $hora = date('H:i');
    $errores = [];

    if(isset($_POST['Enviar'])) {
        if(!empty($_POST['tema'])) {
            $tema = $_POST['tema'];
        } else {
            $errores['tema'] = ['No puede estar vacío'];
        }

        if(!empty($_POST['hora'])) {
            $hora = $_POST['hora'];
        } else {
            $errores['hora'] = ['La hora no puede estar vacía'];
        }
    }
    
    if(count($errores) == 0) {
        //guardar
        file_put_contents(
            "playlist.csv",
            "$tema;$hora\n",
            FILE_APPEND
        );

        //redirigir
        header('Location: listado.php');

        // salir
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Party</title>
    <style>
        * {
            font-family: Arial;
            box-sizing: border-box;
        }

        .error {
            background-color: #cb4335;
            padding: 4px 4px;
            color: white;
            height: fit-content;
            width: fit-content;
        }
        
        .inputs {
            margin: 10px 0;
            display: grid;
            grid-template-columns: 200px;
            gap: 5px;
            font-size: 16px;
        }

        .inputs input {
            font-size: 15px;
        }
        
        input[type=submit] {
            margin: 10px 0;
            font-size: 15px;
        }
        
    </style>
</head>
<body>
    <h2>Never Ending Party (NEP)</h2>
    <form action="" method="POST">
        <div class="inputs">
            <label for="tema">Tema musica:</label>
            <input type="text" name="tema" id="tema" placeholder="Pon una canción" value="<?=$tema?>">    
        </div>
        <?php if(isset($errores['tema'])) : ?>
            <div class="error"><span><?=$errores['tema']?></span></div>
        <?php endif; ?>

        <div class="inputs">
            <label for="hora">Hora:</label>
            <input type="time" name="hora" id="hora" value="<?=$hora?>">
        </div>
        <?php if(isset($errores['hora'])) : ?>
            <div class="error"><span><?=$errores['hora']?></span></div>
        <?php endif; ?>

        <input type="submit" value="Enviar" name="Enviar">
    </form>  
</body>
</html>