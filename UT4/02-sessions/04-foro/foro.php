<?php
    session_start();

    // autoload
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path{$file}.php");
    });

    $form = new php\Config\Form();
    $repliesForm = new php\Config\Form();
    
    @$form->crearInputsThread($_POST);
    @$repliesForm->crearInputsReply($_POST);

    if (isset($_POST['thread'])) {

        if (isset($_SESSION['user'])) {
            $form->validarForm();
    
            if($form->esValido()) {
    
                $form->guardarThread($_SESSION['id']);
                header('Location: foro.php');
    
            }
        } else {
            header('Location: login.php');
        }

    }

    if (isset($_POST['reply'])) {

        if (isset($_SESSION['user'])) {
            $repliesForm->validarForm();
    
            if($repliesForm->esValido() && !empty($_POST['t'])) {

                $repliesForm->guardarReply($_SESSION['id'], $_POST['t']);
                header('Location: foro.php');
    
            }
        } else {
            header('Location: login.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/foro.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title>Foro</title>
    <script src="./js/main.js" defer></script>
    <script src="./js/foro.js" defer></script>
</head>
<body>
    
    <?php require('header.php'); ?>

    <div class="content-wrapper">
        <h1>Foro</h1>
        <!-- <form action="" method="POST"> -->
            <!-- </form> -->
            
        <div class="content-section">
            <button class="add_thread">
                <i class="bi bi-plus" style="font-size: 20px;"></i>
                Añadir hilo
            </button>
            <div class="thread__form">
                <?php
                    $form->crearFormThread('', 'POST');
                ?>
            </div>
        </div>

        <div class="content-section">

            <?php $form->printThreads($repliesForm) ?>

        </div>
    </div>

    <?php require('footer.php'); ?>
    
</body>
</html>