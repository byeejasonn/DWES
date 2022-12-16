<?php

include('./vars.php');

if (isset($_POST['cookies'])) {
    array_pop($_POST);
    // $name = $_POST['name'];
    // $bgColor = $_POST['bg-color'];
    // $fgColor = $_POST['fg-color'];
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }

    header('Location: config.php?current=2');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina1</title>
    <style>
        .input {
            margin: 12px 0;
        }

        .input label {
            display: flex;
            align-items: center;
            gap: 0 10px;
        }

        .input input[type=submit] {
            width: 60px;
            height: 25px;
        }

        <?php include('style.php') ?>
    </style>
</head>
<body>
    <main class="main">

        <?php include('estonosehaceasi.php') ?>
    
        <form action="" method="POST">
            <div class="input">
                <label>
                    Background Color: <input type="color" name="bg-color" id="bg-color" value="<?= $bgColor ?>" >
                </label>
            </div>
    
            <div class="input">
                <label>
                    Foreground Color: <input type="color" name="fg-color" id="fg-color" value="<?= $fgColor ?>" >
                </label>
            </div>
    
            <div class="input">
                <label>
                    Nombre: <input type="text" name="name" id="name" value="<?= $name ?>" >
                </label>
            </div>
    
            <div class="input">
                <input type="submit" value="Enviar" name="cookies">
            </div>
    
        </form>
        
        <?php include('footer.php') ?>

    </main>

</body>
</html>