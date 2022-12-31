<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/inventory.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Inventario</title>
</head>
<body>
    
    <?php require('header.php'); ?>

    <div class="content-wrapper">
        <h1>Inventario</h1>
        <div class="content-section">
                <article>
                    <h2>Hechizos</h2>
                    <div class="items">
                        <img src="./img/invetory/Focus_inventory.png" alt="concentracion" draggable="false">
                        <div>
                            <h3>Concentración</h3>
                            <p>Concentra el ALMA reunida para reparar tu coraza y curarte el daño.<br>Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                        <img src="./img/invetory/Vengeful_Spirit_Icon.png" alt="espiritu vengativo" draggable="false">
                        <div>
                            <h3>Espíritu Vengativo</h3>
                            <p>Conjura un espíritu que volará hacia adelante y quemará a los enemigos en su camino.<br>El espíritu requiere que el ALMA sea conjurada. Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                        <img src="./img/invetory/Desolate_Dive_Icon.png" alt="salto desolador" draggable="false">
                        <div>
                            <h3>Salto Desolador</h3>
                            <p>Golpea el suelo con la intensa fuerza del ALMA. Esta fuerza puede destruir a los enemigos o derribar estructuras frágiles.<br>Para conjurar esta fuerza, se requiere ALMA. Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                        <img src="./img/invetory/Howling_Wraiths_Icon.png" alt="espectros aulladores" draggable="false">
                        <div>
                            <h3>Espectros Aulladores</h3>
                            <p>Sacude a los enemigos con un ALMA estridente.<br>Para conjurar los espectros, se requiere ALMA. Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                        <img src="./img/invetory/Shade_Soul_Icon.png" alt="alma sombira" draggable="false">
                        <div>
                            <h3>Alma Sombria</h3>
                            <p>Conjura una sombra que volará hacia el frente y quemará a los enemigos que se crucen en su camino.<br>Para conjurar esta sombra, se requiere ALMA. Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                        <img src="./img/invetory/Descending_Dark_Icon.png" alt="oscuridad descendente" draggable="false">
                        <div>
                            <h3>Oscuridad Descendente</h3>
                            <p>Golpea el suelo con una fuerza combinada de ALMA y sombra. Esta fuerza puede destruir a los enemigos o derribar estructuras frágiles.<br>Para conjurar esta fuerza, se requiere ALMA. Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                        <img src="./img/invetory/Abyss_Shriek_Icon.png" alt="chillido del abismo" draggable="false">
                        <div>
                            <h3>Chillido del Abismo</h3>
                            <p>Sacude a los enemigos con la fuerza de un ALMA estridente y la sombra.<br>Para conjurar los espectros, se requiere ALMA. Golpea a los enemigos para reunir ALMA.</p>
                        </div>
                    </div>
                </article>
                <article>
                    <h2>Habilidades</h2>
                    <div class="items">
                        <img src="./img/invetory/Mothwing_Cloak_Icon.png" alt="capa de ala de polilla">
                        <div>
                            <h3>Capa de ala de polilla</h3>
                            <p>Capa hecha de hebras de ala de polilla. Permite al portador realizar un Avance Rápido en el suelo o por el aire.</p>
                        </div>
                        <img src="./img/invetory/Mantis_Claw.png" alt="garra de mantis">
                        <div>
                            <h3>Garra de mantis</h3>
                            <p>Garra tallada a partir de hueso. Permite al portador colgarse en las paredes e impulsarse desde ellas.</p>
                        </div>
                        <img src="./img/invetory/Crystal_Heart_Icon.png" alt="corazon de cristal">
                        <div>
                            <h3>Corazón de cristal</h3>
                            <p>El núcleo de energía de un antiguo gólem minero rodeado de un potente cristal. Es posible canalizar la energía del cristal para lanzar al portador hacia delante a velocidades peligrosas.</p>
                        </div>
                        <img src="./img/invetory/Monarch_Wings_Icon.png" alt="alas de monarca">
                        <div>
                            <h3>Alas de monarca</h3>
                            <p>Alas de materia etérea que centellean en la oscuridad. Permite al portador volver a saltar en el aire.</p>
                        </div>
                        <img src="./img/invetory/IsmaTear.png" alt="lagrima de isma">
                        <div>
                            <h3>Lágrima de Isma</h3>
                            <p>El núcleo de energía de un antiguo gólem minero rodeado de un potente cristal. Es posible canalizar la energía del cristal para lanzar al portador hacia delante a velocidades peligrosas.</p>
                        </div>
                        <img src="./img/invetory/Shade_Cloak_Icon.png" alt="capa sombria">
                        <div>
                            <h3>Capa sombría</h3>
                            <p>Capa formada con la sustancia del Abismo. Permite al portador realizar un Avance Rápido a través de enemigos y sus ataques sin recibir daño.</p>
                        </div>
                        <img src="./img/invetory/Dream_Nail.png" alt="aguijon onirico">
                        <div>
                            <h3>Aguijón Onírico</h3>
                            <p>Permite al portador cortar el velo que separa el mundo onírico del real. Se puede usar para revelar sueños ocultos o abrir puertas.</p>
                        </div>
                        <img src="./img/invetory/Awoken_Dream_Nail_Icon.png" alt="aguijon onirico despertado">
                        <div>
                            <h3>Aguijón Onírico despertado</h3>
                            <p>El poder del Aguijón Onírico se ha despertado por completo y te permite acceder a determinados recuerdos protegidos.</p>
                        </div>
                        <img src="./img/invetory/Worldsense.png" alt="sentido del mundo">
                        <div>
                            <h3>Sentido del mundo</h3>
                            <p>Porcentaje de finalización visible en el Inventario.</p>
                        </div>
                        <img src="./img/invetory/Dreamgate.png" alt="portal onirico">
                        <div>
                            <h3>Portal Onírico</h3>
                            <p>Permite al portador viajar instantáneamente a través de los sueños. Algunas áreas pueden no tener una fuerte conexión con ningún sueño,impidiendo el uso de los Portales Oníricos.</p>
                        </div>
                    </div>
                </article>
                <article id="artes">
                    <h2>Artes del Aguijón</h2>
                    <div class="items">
                        <img src="./img/invetory/Cyclone_Slash.png" alt="corte ciclon">
                        <div>
                            <h3>Corte Ciclón</h3>
                            <p>El Arte del aguijón especial del Maestro de aguijones Mato. Un ataque giratorio que golpea rápidamente a los enemigos a ambos lados.</p>
                        </div>
                        <img src="./img/invetory/Dash_Slash.png" alt="corte veloz">
                        <div>
                            <h3>Corte Veloz</h3>
                            <p>El Arte del aguijón especial del Maestro de aguijones Oro. Lanza un golpe veloz tras avanzar rápidamente hacia delante.</p>
                        </div>
                        <img src="./img/invetory/Great_Slash.png" alt="gran corte">
                        <div>
                            <h3>Gran Corte</h3>
                            <p>El Arte del aguijón especial del Maestro de aguijones Sheo. Desata un gran corte directamente delante de ti, que inflige más daño a los enemigos.</p>
                        </div>
                    </div>
                </article>
        </div>
    </div>
    
    <?php require('footer.php'); ?>

    <script src="./js/main.js"></script>
</body>