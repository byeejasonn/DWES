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
    <footer id="footer">
        <p>FanPage by Jason</p>

        <div id="social">
            <a href="http://twitter.com/TeamCherryGames" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg></a>
            <a href="https://www.youtube.com/channel/UCZS2K8ZsUmujTuj3cNMyBSA" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="white" d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z"></path></svg></a>
            <a href="https://www.facebook.com/teamcherrygames/" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path></svg></a>
        </div>
    </footer>
    <script src="./js/main.js"></script>
</body>