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