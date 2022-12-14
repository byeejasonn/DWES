<?php
if (isset($_GET['accept'])) {
    saveCookie('accept', $_GET['accept']);
    header('Location: index.php');
}

function getCookie($nombre) {
    return $_COOKIE[$nombre];
}

function stringCookie($nombre) {
    return $nombre."=".@$_COOKIE[$nombre];
}

function saveCookie($nombre, $valor) {
    setcookie($nombre, $valor);
}

function cookies() {
    @$cookie = getCookie('accept');
    
    if (empty($cookie) || $cookie == 1) : 
?>
        <div class="cookies">
            
            <div class="cookies__buttons">
                <p class="cookie-term">Usamos cookies para mejorar su experiencia de navegación en nuestra web, para mostrarle contenidos personalizados y para analizar el tráfico en nuestra web. <a href="https://www.interior.gob.es/es/politica-de-cookies" target="_blank">Ver Política de cookies</a></p>
                <a href="index.php?accept=1" class="cookie-btn">Rechazar</a>
                <a href="index.php?accept=2" class="cookie-btn btn-accept">Aceptar</a>
            </div>
        </div>
<?php    
    endif;
}
// print_r($_GET);
// print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cookies {
            height: 100vh;
            width: 100%;
            background-color: rgba(0,0,0,0.5);
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
        }

        .cookies__buttons {
            position: absolute;
            bottom: 30px;
            width: 90%;
        }

        .cookie-term {
            margin: 12px 0;
        }

        .cookie-btn {
            background-color: white;
            padding: 3px 5px;
            border-radius: 4px;
            color: black;
            text-decoration: none;
            /* margin: 10px 4px; */
        }

        .btn-accept {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
    <main class="main">
        <h2>Cookies</h2>

        <a href="configurado.php?<?= stringCookie('accept')?>">Acceso</a>
    </main>

    <?= cookies() ?>
</body>
</html>