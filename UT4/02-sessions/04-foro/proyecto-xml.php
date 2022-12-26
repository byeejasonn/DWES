<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/proyecto-xml.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title>Proyecto XML</title>
</head>

<body>

    <?php require('header.php'); ?>

    <div class="content-wrapper">
        <h1>Proyecto Integrador</h1>
        <div class="content-section query1">
            <h2>Categorias</h2>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-deporte" />
                    <label for="checkbox-deporte">
                        <span class="text__underline">Deporte 6517</span>
                        (subcategorias: 8)
                    </label>
                    <ul class="subcategorias">
                        <li>Atletismo (eventos: 15)</li>
                        <li>Baloncesto (eventos: 12)</li>
                        <li>Balonmano (eventos: 3)</li>
                        <li>Fútbol (eventos: 43)</li>
                        <li>Hípica (eventos: 3)</li>
                        <li>Otros (eventos: 17)</li>
                        <li>Rugby (eventos: 2)</li>
                        <li>Tenis (eventos: 2)</li>
                    </ul>
                </li>
            </ul>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-eventos de ciudad" />
                    <label for="checkbox-eventos de ciudad">
                        <span class="text__underline">Eventos de ciudad 6530</span>
                        (subcategorias: 7)
                    </label>
                    <ul class="subcategorias">
                        <li>Arte (eventos: 13)</li>
                        <li>Cine (eventos: 7)</li>
                        <li>Compras (eventos: 11)</li>
                        <li>Fiestas (eventos: 16)</li>
                        <li>Gastronomía (eventos: 8)</li>
                        <li>Moda (eventos: 2)</li>
                        <li>Otros (eventos: 80)</li>
                    </ul>
                </li>
            </ul>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-exposiciones" />
                    <label for="checkbox-exposiciones">
                        <span class="text__underline">Exposiciones 6432</span>
                        (subcategorias: 16)
                    </label>
                    <ul class="subcategorias">
                        <li>Arqueología (eventos: 2)</li>
                        <li>Arquitectura (eventos: 7)</li>
                        <li>Arte, antigüedades y artesanía (eventos: 39)</li>
                        <li>Artes decorativas (eventos: 3)</li>
                        <li>Ciencias (eventos: 10)</li>
                        <li>Dibujo (eventos: 19)</li>
                        <li>Diseño (eventos: 18)</li>
                        <li>Escultura (eventos: 35)</li>
                        <li>Fotografía (eventos: 64)</li>
                        <li>Grabado (eventos: 9)</li>
                        <li>Historia (eventos: 35)</li>
                        <li>Instalaciones (eventos: 60)</li>
                        <li>Otros (eventos: 47)</li>
                        <li>Pintura (eventos: 81)</li>
                        <li>Salud (eventos: 3)</li>
                        <li>Vídeo (eventos: 24)</li>
                    </ul>
                </li>
            </ul>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-ferias" />
                    <label for="checkbox-ferias">
                        <span class="text__underline">Ferias 6469</span>
                        (subcategorias: 14)
                    </label>
                    <ul class="subcategorias">
                        <li>Alimentación (eventos: 7)</li>
                        <li>Arte, antigüedades y artesanía (eventos: 12)</li>
                        <li>Automoción (eventos: 4)</li>
                        <li>Deporte (eventos: 2)</li>
                        <li>Empresas y negocios (eventos: 14)</li>
                        <li>Energía, instalaciones y equipamientos (eventos: 4)</li>
                        <li>Mobiliario (eventos: 1)</li>
                        <li>Moda y complementos (eventos: 6)</li>
                        <li>Ocio y entretenimiento (eventos: 3)</li>
                        <li>Otros (eventos: 15)</li>
                        <li>Salud (eventos: 3)</li>
                        <li>Servicios inmobiliarios (eventos: 1)</li>
                        <li>Tecnología y ciencia (eventos: 6)</li>
                        <li>Turismo (eventos: 1)</li>
                    </ul>
                </li>
            </ul>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-música" />
                    <label for="checkbox-música">
                        <span class="text__underline">Música 6449</span>
                        (subcategorias: 19)
                    </label>
                    <ul class="subcategorias">
                        <li>Cantautor (eventos: 37)</li>
                        <li>Clásica (eventos: 72)</li>
                        <li>Electrónica (eventos: 34)</li>
                        <li>Experimental (eventos: 8)</li>
                        <li>Festival (eventos: 27)</li>
                        <li>Flamenco (eventos: 20)</li>
                        <li>Folk (eventos: 40)</li>
                        <li>Funk (eventos: 4)</li>
                        <li>Heavy metal (eventos: 29)</li>
                        <li>Indie (eventos: 58)</li>
                        <li>Jazz-blues (eventos: 58)</li>
                        <li>Latina (eventos: 21)</li>
                        <li>Melódica (eventos: 14)</li>
                        <li>Otros (eventos: 136)</li>
                        <li>Pop-rock (eventos: 317)</li>
                        <li>Rap (eventos: 22)</li>
                        <li>Reggae (eventos: 4)</li>
                        <li>Zarzuela (eventos: 4)</li>
                        <li>Ópera (eventos: 17)</li>
                    </ul>
                </li>
            </ul>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-niños" />
                    <label for="checkbox-niños">
                        <span class="text__underline">Niños 6506</span>
                        (subcategorias: 10)
                    </label>
                    <ul class="subcategorias">
                        <li>Circo (eventos: 4)</li>
                        <li>Danza (eventos: 2)</li>
                        <li>Deporte (eventos: 1)</li>
                        <li>Magia (eventos: 8)</li>
                        <li>Musical (eventos: 22)</li>
                        <li>Música (eventos: 6)</li>
                        <li>Otros (eventos: 9)</li>
                        <li>Talleres (eventos: 1)</li>
                        <li>Teatro (eventos: 49)</li>
                        <li>Títeres (eventos: 16)</li>
                    </ul>
                </li>
            </ul>
            <ul class="categoria">
                <li>
                    <input type="checkbox" id="checkbox-teatro y danza" />
                    <label for="checkbox-teatro y danza">
                        <span class="text__underline">Teatro y danza 6486</span>
                        (subcategorias: 13)
                    </label>
                    <ul class="subcategorias">
                        <li>Circo (eventos: 15)</li>
                        <li>Comedia (eventos: 167)</li>
                        <li>Danza clásica (eventos: 2)</li>
                        <li>Danza moderna (eventos: 38)</li>
                        <li>Drama (eventos: 86)</li>
                        <li>Flamenco (eventos: 9)</li>
                        <li>Humor (eventos: 4)</li>
                        <li>Magia (eventos: 15)</li>
                        <li>Musical (eventos: 43)</li>
                        <li>Otros (eventos: 30)</li>
                        <li>Tragicomedia (eventos: 22)</li>
                        <li>Zarzuela (eventos: 5)</li>
                        <li>Ópera (eventos: 12)</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content-section query2">
            <h2>Música</h2>
            <table>
                <tr>
                    <td colspan="2">
                        <h3>
                            <span class="text__underline">WiZink Center de Felipe II, s/n, 28009, Madrid, España</span>
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/roger-waters-wizink-center" target="_blank">Roger Waters</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>25/05/2018 - 26/05/2018</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ringo-starr-wizink-center" target="_blank">Ringo Starr &amp; His All-Starr Band</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>28/06/2018</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/slash-wizink-center" target="_blank">Slash</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>13/03/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/florence-machine-wizink-center" target="_blank">Florence + The Machine</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>21/03/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/mark-knopfler-wizink-center" target="_blank">Mark Knopfler</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>28/04/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ennio-morricone-wizink-center" target="_blank">Ennio Morricone</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>07/05/2019 - 08/05/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/alvaro-soler-wizink-center" target="_blank">Álvaro Soler</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>26/05/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/eddie-vedder-glen-hansard-wizink-center" target="_blank">Eddie Vedder con Glen Hansard</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>22/06/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/elton-john-wizink-center" target="_blank">Elton John</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>26/06/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/sech-wizink-center" target="_blank">Sech</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>13/07/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/billie-eilish-wizink-center" target="_blank">Billie Eilish</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>03/09/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/little-mix-wizink-center" target="_blank">Little Mix</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>16/09/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/michael-buble-wizink-center" target="_blank">Michael Bublé</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>28/09/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/polla-records-wizink-center" target="_blank">La Polla Records</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>11/10/2019 - 12/10/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/desde-que-no-nos-vemos-homenaje-a-enrique-urquijo-wizink-center" target="_blank">Desde que no nos vemos - Homenaje a Enrique Urquijo</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>17/11/2019</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/hija-luna-robin-torres-wizink-center" target="_blank">Hija de la luna - Robin Torres</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>11/01/2020</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/melanie-martinez-wizink-center" target="_blank">Melanie Martínez</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>22/01/2020</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/halsey-wizink-center" target="_blank">Halsey</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>06/02/2020</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/jonas-brothers-wizink-center" target="_blank">Jonas Brothers</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>16/02/2020</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/editors-riviera" target="_blank">Editors</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>17/02/2020</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/xoel-lopez-wizink-center" target="_blank">Xoel López</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>22/01/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/maluma-wizink-center" target="_blank">Maluma</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>05/04/2022</p>
                        <p>08/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/cock-sparrer-50th-anniversary-party-wizink-center" target="_blank">Cock Sparrer - 50th Anniversary Party</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>09/04/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/miss-caffeina-wizink-center" target="_blank">Miss Caffeina</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>23/04/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/carlos-sadness-wizink-center" target="_blank">Carlos Sadness</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>30/04/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/fito-paez-wizink-center" target="_blank">Fito Páez</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>05/05/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/siniestro-total-wizink-center" target="_blank">Siniestro Total</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>06/05/2022 - 07/05/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/malu-wizink-center" target="_blank">Malú</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>12/05/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/fito-fitipaldis-wizink-center" target="_blank">Fito &amp; Fitipaldis</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>13/05/2022</p>
                        <p>02/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/nil-moliner-wizink-center" target="_blank">Nil Moliner</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>19/05/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/fondo-flamenco-wizink-center" target="_blank">Fondo Flamenco</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>20/05/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/bad-religion-wizink-center" target="_blank">Bad Religion</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>21/05/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/leiva-wizink-center" target="_blank">Leiva</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>01/06/2022 - 05/06/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/dua-lipa-wizink-center" target="_blank">Dua Lipa</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>03/06/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/camilo-wizink-center" target="_blank">Camilo</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>25/06/2022</p>
                        <p>27/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/andres-calamaro-wizink-center" target="_blank">Andrés Calamaro</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>28/06/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/sebastian-yatra-wizink-center" target="_blank">Sebastián Yatra</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>29/06/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/kiss-wizink-center" target="_blank">KISS</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>03/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/alicia-keys-wizink-center" target="_blank">Alicia Keys</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>04/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/queen-adam-lambert-wizink-center" target="_blank">Queen + Adam Lambert</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>06/07/2022 - 07/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/juan-luis-guerra-wizink-center" target="_blank">Juan Luis Guerra</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>10/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/alejandro-fernandez-wizink-center" target="_blank">Alejandro Fernández</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>26/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/harry-styles-wizink-center" target="_blank">Harry Styles</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>29/07/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/limp-bizkit-wizink-center" target="_blank">Limp Bizkit</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>24/08/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/this-is-michael-wizink-center" target="_blank">This is Michael</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>01/09/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/melendi-wizink-center" target="_blank">Melendi</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>02/09/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/bunbury-wizink-center" target="_blank">Bunbury</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>10/09/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/2cellos-wizink-center" target="_blank">2Cellos</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>17/09/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/aitana-wizink-center" target="_blank">Aitana</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>18/09/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/estopa-wizink-center" target="_blank">Estopa</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>30/09/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/thomas-anders-modern-talking-band-sandra-wizink-center" target="_blank">Thomas Anders, Modern Talking Band y Sandra</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>09/10/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/black-crowes-wizink-center" target="_blank">The Black Crowes</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>18/10/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/franz-ferdinand-wizink-center" target="_blank">Franz Ferdinand</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>26/10/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/izal-wizink-center" target="_blank">IZAL</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>29/10/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/moderat-live-wizink-center" target="_blank">Moderat Live</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>07/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/bon-iver-wizink-center" target="_blank">Bon Iver</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>09/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/cure-wizink-center" target="_blank">The Cure</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>11/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ojete-calor-xtrmly-live-wizink-center" target="_blank">Ojete Calor - Xtrmly Live</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>12/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/kase-o-wizink-center" target="_blank">KASE.O</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>18/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/antonio-orozco-wizink-center" target="_blank">Antonio Orozco</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>22/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/dorian-wizink-center" target="_blank">Dorian</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>25/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/bastille-wizink-center" target="_blank">Bastille</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>30/11/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/zoo-wizink-center" target="_blank">Zoo</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>03/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/serrat-wizink-center" target="_blank">Serrat</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>13/12/2022 - 14/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/vanesa-martin-wizink-center" target="_blank">Vanesa Martín</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>16/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/raphael-tour-60-wizink-center" target="_blank">Raphael - Tour 6.0</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>17/12/2022 - 18/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/manolo-garcia-wizink-center" target="_blank">Manolo García</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>20/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/victor-manuel-sinfonico-wizink-center" target="_blank">Víctor Manuel Sinfónico</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>21/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/secretos-wizink-center" target="_blank">Los Secretos</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>23/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/coque-malla-wizink-center" target="_blank">Coque Malla</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>27/12/2022</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/rock-familia-christmas-party-wizink-center" target="_blank">Rock En Familia - Christmas Party</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>07/01/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/rulo-contrabanda-wizink-center" target="_blank">Rulo y la Contrabanda</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>14/01/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/justin-bieber-wizink-center" target="_blank">Justin Bieber</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>23/01/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/helloween-wizink-center" target="_blank">Helloween</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>04/02/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/natos-waor-wizink-center" target="_blank">Natos y Waor</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>18/02/2023</p>
                        <p>14/10/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ozzy-osbourne-wizink-center" target="_blank">Ozzy Osbourne</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>10/05/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/shawn-mendes-wizink-center" target="_blank">Shawn Mendes</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>05/06/2023</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/hollywood-sinfonico-wizink-center" target="_blank">Hollywood Sinfónico</a>
                    </td>
                    <td class="tabla__fecha">
                        <p>10/11/2023</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Conciertos totales en el WiZink Center: 78</td>
                </tr>
            </table>
        </div>
        <div class="content-section query3">
            <h2>Eventos de ciudad, Arte</h2>
            <div class="image__wrapper">
                <h3>Mariano Benlliure. El placer de esculpir</h3>
                <a href="http://www.esmadrid.com/agenda/mariano-benlliure-75-aniversario" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/GubdNLVzzu2juUXiEgSiRJEQdZkwz73wQkOZZ72H4_o/mtime:1648721068/sites/default/files/eventos/eventos/mariano_benlliure._el_placer_de_esculpir.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Taller Zim Lim</h3>
                <a href="http://www.esmadrid.com/agenda/taller-zim-lim-madrid-academy-art" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/O-Gsc5DBIfAvQQFqbLNJeB7ZNiCepKxIZ-9h-PRNqyc/mtime:1647429112/sites/default/files/eventos/eventos/zin-lim.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Taller Oliver Sin</h3>
                <a href="http://www.esmadrid.com/agenda/taller-oliver-sin-madrid-academy-art" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/eK2aUkyDPCfB9sbFYPrQQqKu72Vu0AXB4GG3nrkeQso/mtime:1647424698/sites/default/files/eventos/eventos/oliver-sin.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Taller Daniela Astone</h3>
                <a href="http://www.esmadrid.com/agenda/taller-daniela-astone-madrid-academy-art" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/lizBVqB3B3JMX4UULGVpuRhfwxtWyopp1dOqnr26Wh4/mtime:1647418198/sites/default/files/eventos/eventos/daniela-astone.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Visita guiada a las obras maestras del Museo Nacional Thyssen-Bornemisza</h3>
                <a href="http://www.esmadrid.com/agenda/visita-guiada-obras-maestras-museo-nacional-thyssen-bornemisza" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/Q6mJ5F1pEK0agUDGaoqPdJqbK2omDZkjJdOGbwpCemk/mtime:1646064672/sites/default/files/eventos/eventos/visita_guiada_a_las_obras_maestras_del_museo.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Los Sábados de El Rastro</h3>
                <a href="http://www.esmadrid.com/agenda/sabados-rastro-plaza-general-vara-rey" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/HXgBN_lrux42txoD9XLPbygqcp4RZp0VU8sV5k57O0M/mtime:1630314580/sites/default/files/eventos/eventos/lossabados_del_rastro.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Visita temática Palacio de Liria Eugenia Emperatriz</h3>
                <a href="http://www.esmadrid.com/agenda/eugenia-emperatriz-palacio-liria" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/t5kCVdtz01xXwOlxm5v1LRaOhyXeLeyFUoObAVTtWzU/mtime:1620804413/sites/default/files/eventos/eventos/eugenia-emperatriz.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Gulliverb y Aran360</h3>
                <a href="http://www.esmadrid.com/agenda/gulliverb-aran360-domo-360" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/_Wfbp86SQGntZZjbPUCgmIKDHpQJ1bL_8Xq59ERv9Jc/mtime:1619514078/sites/default/files/eventos/eventos/aran_360.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>21DISTRITOS 2022</h3>
                <a href="http://www.esmadrid.com/agenda/21distritos" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/R85b8BX_wR6HkIn71H96tiUUdUCrJNBsQN8gLxmq2g8/mtime:1644400009/sites/default/files/eventos/eventos/lichis_21distritos_2022.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Meninas Madrid Gallery 2021</h3>
                <a href="http://www.esmadrid.com/agenda/meninas-madrid-gallery" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/kGRtIK5cw2W9hxwe5r47wOw2Jt1IzI6QFPfjHDQAXsU/mtime:1637580379/sites/default/files/eventos/eventos/menina_lgtbi_2021.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>Madrid Design Festival</h3>
                <a href="http://www.esmadrid.com/agenda/madrid-design-festival" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/IrAGmPUj5gl5TKIiXzSNhUm8H01ZOJex5HhvVr8IIV0/mtime:1647879859/sites/default/files/eventos/eventos/madrid_design_festival_0.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>MadridFFF Pride</h3>
                <a href="http://www.esmadrid.com/agenda/madridfff-pride-el-paracaidista" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/KStnPWFFz6N0A3st8RaUgPDj6oRFlvg4qgDtsc6mvF8/mtime:1494336361/sites/default/files/agenda/eventos/pride11.jpg" class="main__img" />
                </a>
            </div>
            <div class="image__wrapper">
                <h3>DecorAcción</h3>
                <a href="http://www.esmadrid.com/agenda/decoraccion-barrio-de-las-letras" target="_blank">
                    <img src="https://estaticos.esmadrid.com/cdn/farfuture/6uCfEZ-F2v2aU5GfEjYdWzyizxAI6Aye5IGD3BPpBe4/mtime:1495185835/sites/default/files/agenda/eventos/mercadillo_0.jpg" class="main__img" />
                </a>
            </div>
            <p>Total: 13</p>
        </div>
        <div class="content-section query4">
            <h2>Eventos de Alcorcón</h2>
            <table>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/primavera-terraza-honna-surf-hub-x-madrid" target="_blank">Primavera Terraza Honna Surf Hub (X - Madrid)</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ad-alcorcon-sd-eibar-laliga-smartbank-estadio-municipal-santo-domingo" target="_blank">AD Alcorcón - SD Eibar (LaLiga SmartBank)</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/harry-potter-book-night-x-madrid" target="_blank">Harry Potter Book Night</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ad-alcorcon-real-oviedo-laliga-smartbank-estadio-municipal-santo-domingo" target="_blank">AD Alcorcón - Real Oviedo (LaLiga SmartBank)</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ad-alcorcon-ud-palmas-laliga-smartbank-estadio-municipal-santo-domingo" target="_blank">AD Alcorcón - UD Las Palmas (LaLiga SmartBank)</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ad-alcorcon-real-sporting-gijon-laliga-smartbank-estadio-municipal-santo-domingo" target="_blank">AD Alcorcón - Real Sporting de Gijón (LaLiga SmartBank)</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.esmadrid.com/agenda/ad-alcorcon-girona-fc-laliga-smartbank-estadio-municipal-santo-domingo" target="_blank">AD Alcorcón - Girona FC (LaLiga SmartBank)</a>
                    </td>
                    <td class="tabla__fecha">2022</td>
                </tr>
            </table>
        </div>
        <div class="content-section query5">
            <h2>Mapa de los próximos concierto de Camilo</h2>
            <div id="map" />
        </div>
    </div>
    <footer id="footer">
        <p>FanPage by Jason</p>
        <div id="social">
            <a href="http://twitter.com/TeamCherryGames" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter" role="img" viewBox="0 0 512 512">
                    <path fill="white" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z" />
                </svg>
            </a>
            <a href="https://www.youtube.com/channel/UCZS2K8ZsUmujTuj3cNMyBSA" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube" role="img" viewBox="0 0 576 512">
                    <path fill="white" d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z" />
                </svg>
            </a>
            <a href="https://www.facebook.com/teamcherrygames/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook" role="img" viewBox="0 0 512 512">
                    <path fill="white" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z" />
                </svg>
            </a>
        </div>
    </footer>
    <script src="./js/main.js">
        //
    </script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin="">
        //
    </script>
    <script>
        let mapOptions = {
            center: [40.423859700000, -3.671842100000],
            zoom: 18
        }

        let map = new L.map('map', mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        let marker = new L.Marker([40.423859700000, -3.671842100000]);
        marker.addTo(map);
        marker = L.marker([40.423859700000, -3.671842100000]).addTo(map);
        marker.bindPopup('Próximo concierto de Camilo el día 27/07/2022').openPopup();
    </script>
</body>

</html>