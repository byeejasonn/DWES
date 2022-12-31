<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Hollow Knight FanPage</title>
</head>
<body>
    <audio src="./music/mainTheme.mp3" autoplay loop preload="metadata"></audio>
    
    <?php require('header.php'); ?>

    <div class="content-wrapper">
        <h1>Inicio</h1>
        <div class="content-section">
            <h2>Desafía las profundidades de un reino olvidado</h2>
            <p>Debajo de la ciudad desvanecida de Boca Sucia duerme un vasto y antiguo reino. Muchos son atraídos bajo la superficie, en busca de riquezas, gloria o respuestas a viejos secretos.</p>
            <p>Como el enigmático Caballero, atravesarás las profundidades, desentrañarás sus misterios y conquistarás sus males.</p>
             <img src="./img/img1.png" alt="img1">
        </div>
        <div class="content-section">
            <h2>Usa tus habilidades y reflejos para sobrevivir</h2>
            <p>Hollow Knight es una desafiante aventura de acción en 2D. Explorarás cavernas retorcidas, lucharás contra criaturas contaminadas y escaparás de intrincadas trampas, todo para resolver un antiguo misterio oculto durante mucho tiempo.</p>
                <ul>
                    <li>Explora vastos mundos interconectados</li>
                    <li>Encuentra una extraña colección de amigos y enemigos</li>
                    <li>Evoluciona con nuevas y poderosas habilidades y destrezas</li>
                </ul>
            <img src="./img/img2.png" alt="img2">
        </div>
        <div class="content-section">
            <h2>Trailer</h2>
                <iframe src="https://www.youtube.com/embed/UAO2urG23S4" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="content-section">
            <h2>Plataformas</h2>
                <div class="platforms">
                    <a href="https://www.nintendo.com/games/detail/hollow-knight-switch/" target="_blank"><img src="./img/brands/nintendo.png" alt="nintendo"></a>
                    <a href="https://store.playstation.com/en-us/product/UP1822-CUSA13632_00-HOLLOWKNIGHT18US" target="_blank"><img src="./img/brands/ps4.png" alt="play station"></a>
                    <a href="https://www.microsoft.com/en-us/p/hollow-knight-voidheart-edition/9mw9469v91lm" target="_blank"><img src="./img/brands/xbox.png" alt="xbox"></a>
                    <a href="https://store.steampowered.com/app/367520/Hollow_Knight/" target="_blank"><img src="./img/brands/steam.png" alt="steam"></a>
                    <a href="https://www.gog.com/game/hollow_knight" target="_blank"><img src="./img/brands/gog.png" alt="gog"></a>
                    <a href="https://www.humblebundle.com/store/hollow-knight" target="_blank"><img src="./img/brands/humble.png" alt="humble store"></a>
                </div>
        </div>
    </div>

    <?php require('footer.php'); ?>

    <script src="./js/main.js"></script>
</body>
</html>