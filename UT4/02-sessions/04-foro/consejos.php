<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Consejos</title>
</head>
<body>
    
    <?php require('header.php'); ?>

    <div class="content-wrapper">
        <h1>Consejos</h1>
        <div class="content-section">
            <h2>Pogo-Jump</h2>
            <p>El pogo-jump es una mecánica de Hollow Knight que viene bien tanto para peleas como para exploración, se basa en hacer un ataque encima de un enemigo para rebotar y ganar altura, esto podremos hacerlo tantas veces como el enemigo aguante. Mientras exploramos también podremos hacerlo para llegar a zonas que no podemos (aunque son todas accesibles sin este método) porque a lo mejor no tenemos la habilidad requerida. Pogo-jumping también reinicia el doble salto, esto está bien saberlo.</p>
        </div>
        <div class="content-section">
            <h2>Artes del Aguijón</h2>
            <p>Según el estilo de batalla puede que uses más o menos las <a href="./inventario.php#artes">artes del aguijón</a> pero esta bien tenerlas presentes ya que hacen mucho daño, la más util es la de gran corte y su variante corte veloz, en el <a href="#coliseum">video</a> de abajo puedes ver como lo usa para matar insectos molestos de un golpe.</p>
        </div>
        <div class="content-section">
            <h2>Hechizos</h2>
            <p>Nuevamente según tu estilo de juego los usaras más o menos, estos son muy fuertes si encima consigues su variante del vacío, aparte si haces sinergias con los <a href="./img/charms.png" target="_blank">charms (amuletos)</a> puedes hacer mucho más daño.</p>
        </div>
        <div class="content-section">
            <video controls id="coliseum">
                <source src="./video/coliseum.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <?php require('footer.php'); ?>

    <script src="./js/main.js"></script>
</body>
</html>