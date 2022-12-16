<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] != '') {
    header('Location: login.php?error=No implementado');
    exit;
} else {
    
}

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>

<body>
    <h1>Bienvenido!!</h1>
    <?php include('menu.php') ?>
    <p>Información solo para gente autentificada</p>
</body>

</html>