<?php
    if (isset($_GET['accept'])) {
        $valor = $_GET['accept'];

        if ($valor == 2) {
            header('Location: configurado.php');
        } else {
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <main class="main">
        <h2>Bienvenido a</h2>
        <h1>Accesos</h1>
    </main>
</body>
</html>